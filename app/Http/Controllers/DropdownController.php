<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Provinsi, District, City, Subdistrict};
use DB;

class DropdownController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinsi = Provinsi::select('id', 'name')->get();
        return view('index',compact('provinsi'));
    }

    public function getKota($nama_provinsi)
    {   
        $kota = City::join('reg_provinces', 'reg_provinces.id', '=', 'reg_regencies.province_id')->where('reg_provinces.name', '=', $nama_provinsi)->select('reg_regencies.name')->pluck('reg_regencies.name');
        //$states = DB::table("states")->where("countries_id",$id)->pluck("name","id");
        return json_encode($kota);

    }

    public function getDistrict($nama_city)
    {   
        $kecamatan = District::join('reg_regencies', 'reg_regencies.id', '=', 'reg_districts.regency_id')->where('reg_regencies.name', '=', $nama_city)->select('reg_districts.name')->pluck('reg_districts.name');
        //$states = DB::table("states")->where("countries_id",$id)->pluck("name","id");
        return json_encode($kecamatan);

    }

    public function getSubdistrict($nama_district)
    {   
        $desa = Subdistrict::join('reg_districts', 'reg_districts.id', '=', 'reg_villages.district_id')->where('reg_districts.name', '=', $nama_district)->select('reg_villages.name')->pluck('reg_villages.name');
        //$states = DB::table("states")->where("countries_id",$id)->pluck("name","id");
        return json_encode($desa);

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
    public function store(Request $request)
    {
        //
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
}
