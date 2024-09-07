<?php

namespace App\Http\Controllers;

use App\Models\kriteria;
use App\Models\KriteriaPlot;
use Illuminate\Http\Request;
use App\Models\KriteriaBobot;
use App\Models\listPembobotan;
use App\Models\RekrutmenModel;
use App\Models\KriteriaPerbandingan;
use RealRashid\SweetAlert\Facades\Alert;

class HitungKriteria extends Controller
{
    public function index(){
        $this->authorize('isAdmin');
        return view('kriteria.opsi.hitung',[
            'kriteria' => kriteria::all()->toArray(),
            'rekrutmen' => listPembobotan::all()
        ]);
    }

    public function store(Request $request, RekrutmenModel $hitung_kriterium){
        $this->authorize('isAdmin');

        $id_list = $hitung_kriterium->id;
        $data = $hitung_kriterium->KriteriaPlot;
        
        $keys = array();
        foreach ($data as $key => $value) {
            if($value->kriteria->store_nilai == true){
                $keys[$key] = $value->kriteria->id;
            }
        }

        $kriteria = kriteria::whereIn('id', $keys)->get();
        $loop = count($kriteria);

        $array = array_values($request->except(['_token']));
        
        $matrix = $this->toMDA($array, $loop);

        $col_total = $this->sum_Mat($matrix);

        $norm = $this->nm_Mat($col_total, $matrix);

        $weight = $this->find_weight($norm);

        $normAW = $this->find_normAfterWeight($weight, $matrix); 
        $eigenval = $this->eigen_val($normAW, $weight);
        $cons = $this->find_consistency($eigenval, $weight);

        if($cons["cr"] > 0.1){
            return back()->with('toast_error', 'Perbandingan tidak konsisten!')->withInput();
        }

        $iteration = 0;
        for ($i=0; $i < $loop; $i++) { 
            for ($j=$i+1; $j <$loop ; $j++) { 
                $datas = [
                    "rekrutmen_model_id" => $id_list,
                    "kriteria_id_1" => $kriteria[$i]->id,
                    "kriteria_id_2" => $kriteria[$j]->id,
                    "value" => $array[$iteration]
                ];
                $iteration++;

                KriteriaPerbandingan::Create($datas);
            }
        }

        $ulang = 0;
        foreach ($data as $key => $value) {
            if($value->kriteria->store_nilai == true){
                $id = $value->id;
                $param = [
                    'weight' => $weight[$ulang]
                ];
                KriteriaPlot::where('id', $id)->update($param);
                $ulang++;
            }
        }

        RekrutmenModel::where('id', $id_list)->update([
            "is_calculated" => true,
            "l_max" => $eigenval,
            "c_index" => $cons["ci"],
            "c_ratio" => $cons["cr"]
        ]);

        return redirect('/hitung-kriteria')->with('success', 'Pemprioritasan telah dilakukan!');
    }

    private function find_consistency($eigenval, $weight){
        $num = count($weight);
        $RI = [0, 0, 0.58, 0.9, 1.12, 1.24, 1.32, 1.41, 1.45, 1.49];
        $ci = ($eigenval-$num)/($num-1);
        $cr = 0;
        for ($i=0; $i < 10 ; $i++) { //perlu diperbaiki karena jumlah maksimal kriteria hanya 10
            if($num == $i+1){
                $cr = $ci/$RI[$i];
            }
        }
        $data = [
            "cr" => $cr,
            "ci" => $ci];
        return $data;
    }

    private function eigen_val(array $weightedSum, array $weight){
        $numColumns = count($weight);//=3
        //var_dump(count($ahpMatrix)); die;
        // Array untuk menyimpan total nilai pada setiap kolom
        $columnTotal = array();

        // Loop untuk menjumlahkan setiap kolom
        for ($col = 0; $col < $numColumns; $col++) {
            $total = 0;
            for ($row = 0; $row < $numColumns; $row++) {
                $total += $weightedSum[$col][$row];
            }
            $columnTotal[$col] = $total;
        }

        $eigenvec = array();
        for ($col = 0; $col < $numColumns; $col++) {
            $eigenvec[$col] = $columnTotal[$col]/$weight[$col];
        }

        $total = 0;
        for ($col = 0; $col < $numColumns; $col++) {
            $total += $eigenvec[$col];
        }

        return $total/count($weight);
    }

    private function find_normAfterWeight(array $weight, array $matrix){
        $numColumns = count($weight);//=3
        //var_dump(count($ahpMatrix)); die;
        // Array untuk menyimpan total nilai pada setiap kolom
        $norm = array();

        // Loop untuk menjumlahkan setiap kolom
        for ($col = 0; $col < $numColumns; $col++) {
            $temp = array();
            for ($row = 0; $row < $numColumns; $row++) {
                $temp[$row] = $matrix[$col][$row]*$weight[$row];
            }
            $norm[] = $temp;
        }
        return $norm;
    }

    private function find_weight(array $norm_matrix){
        // Jumlah kolom pada matriks AHP
        $numColumns = count($norm_matrix);//=3
        //var_dump(count($ahpMatrix)); die;
        // Array untuk menyimpan total nilai pada setiap kolom
        $columnTotal = array();

        // Loop untuk menjumlahkan setiap kolom
        for ($col = 0; $col < $numColumns; $col++) {
            $total = 0;
            for ($row = 0; $row < count($norm_matrix); $row++) {
                $total += $norm_matrix[$col][$row];
            }
            $columnTotal[$col] = $total/$numColumns;
        }
        return $columnTotal;
    }

    private function nm_Mat(array $total, array $matrix){
        // Jumlah kolom pada matriks AHP
        $numColumns = count($matrix);//=3
        //var_dump(count($ahpMatrix)); die;
        // Array untuk menyimpan total nilai pada setiap kolom
        $norm = array();

        // Loop untuk menjumlahkan setiap kolom
        for ($col = 0; $col < $numColumns; $col++) {
            $temp = array();
            for ($row = 0; $row < count($matrix); $row++) {
                $temp[$row] = $matrix[$col][$row]/$total[$row];
            }
            $norm[] = $temp;
        }
        return $norm;
    }

    private function sum_Mat(array $matrix){
        // Jumlah kolom pada matriks AHP
        $numColumns = count($matrix);//=3
        //var_dump(count($ahpMatrix)); die;
        // Array untuk menyimpan total nilai pada setiap kolom
        $columnTotal = array();

        // Loop untuk menjumlahkan setiap kolom
        for ($col = 0; $col < $numColumns; $col++) {
            $total = 0;
            for ($row = 0; $row < count($matrix); $row++) {
                $total += $matrix[$row][$col];
            }
            $columnTotal[$col] = $total;
        }
        return $columnTotal;
    }

    private function toMDA(array $array, $loop){
        $arr_mul = array();
        $loop_index_array = 0;
        $iteration = 0;
        for($i = 0; $i < $loop; $i++){
            $temp = array();
            for($j = 0; $j < $loop; $j++){
                if($i == $j){
                    $temp[$j] = 1;
                    $iteration++;
                }else{
                    if($iteration < $loop){
                        $temp[$j] = (float) $array[$loop_index_array];
                        // $arr_mul[$i][$j] = $array[$loop_index_array];
                        $loop_index_array++;
                        $iteration++;
                    }else{
                        if($j < $i){
                            for($k = 0; $k < $i; $k++){
                                $temp[$k] = (float) $arr_mul[$k][$k]/$arr_mul[$k][$i];
                                $iteration++;
                                // $arr_mul[$i][$k] = $arr_mul[$k][$k]/$arr_mul[$k][$i];
                            }
                        }
                        else{
                            $temp[$j] = (float) $array[$loop_index_array];
                            // $arr_mul[$i][$j] = $arr[$loop_index_array];
                            $loop_index_array++;
                            $iteration++;
                        }
                    }
                }
            }
            $arr_mul[] = $temp;
            // if($loop_index_array > 5){
            //     return $arr_mul;
            //     die;
            // }
        }
        return $arr_mul;
    }

    // public function isExist(Request $request){
    //     $id_list = $request->input('id_list');
    //     $old_data = KriteriaBobot::where('list_pembobotan_id', $id_list)->get();
    //     return response()->json(['exists' => $old_data, 'status' => true]);
    // }

    // public function terminateTarget(Request $request){
    //     $id_list = $request->input('id_list');
    //     $delete = KriteriaBobot::where('list_pembobotan_id', $id_list)->delete();
    //     return response()->json(["status" => "cleared"]);
    // }
}
