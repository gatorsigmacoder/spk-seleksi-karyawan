<?php

namespace App\Http\Controllers;

use App\Models\kriteria;
use App\Models\Subkriteria;
use Illuminate\Http\Request;
use App\Models\SubkriteriaBobot;
use App\Models\SubkriteriaCompareList;
use App\Models\SubkriteriaPerbandingan;

class HitungSubkriteria extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, kriteria $subctr_c_list)
    {   
        $this->authorize('isAdmin');
        $subkriteria = $subctr_c_list->Subkriteria;
        $loop = $subkriteria->count();
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
                    "kriteria_id" => $subctr_c_list->id,
                    "subkriteria_id_1" => $subkriteria[$i]->id,
                    "subkriteria_id_2" => $subkriteria[$j]->id,
                    "value" => $array[$iteration]
                ];
                $iteration++;

                SubkriteriaPerbandingan::Create($datas);
            }
        }

        foreach ($subkriteria as $key => $value) {
            $datas = [
                "weight" => $weight[$key]
            ];

            Subkriteria::where('id', $value->id)->update($datas);
        }

        kriteria::where('id', $subctr_c_list->id)->update([
            "is_calculated" => true,
            "l_max" => $eigenval,
            "c_index" => $cons["ci"],
            "c_ratio" => $cons["cr"]
        ]);

        return redirect('/hitung-subkriteria')->with('success', 'Pemprioritasan telah dilakukan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
                        $temp[$j] = (int) $array[$loop_index_array];
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
                            $temp[$j] = (int) $array[$loop_index_array];
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
}
