<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidaSecre;
use App\Models\Secretaria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerSecretaria extends Controller
{

    public function mostsecre()
    {
        //para llenar tabla
        $selecadmin = Secretaria::select(

            'ID_SECRETARIAL',
            'SECRETARIA_AP_PAT',
            'SECRETARIA_AP_MAT',
            'SECRETARIA_NOMBRE',
            'SECRETARIA_SEXO',
            'SECRETARIA_FECHA_NAC'
        )->get();


        return view('secretaria', compact('selecadmin'));
    }

    public function agregasecre(ValidaSecre $informacion)
    {

        DB::insert(

            'INSERT INTO `secretarias` 
        (`ID_SECRETARIAL`, `SECRETARIA_CLAVE`, `SECRETARIA_AP_PAT`, `SECRETARIA_AP_MAT`, `SECRETARIA_NOMBRE`,
        `SECRETARIA_SEXO`, `SECRETARIA_TIPO_SANGRE`, `SECRETARIA_FECHA_NAC`, `SECRETARIA_CALLE`, `SECRETARIA_COLONIA`,
        `SECRETARIA_MUNICIPIO`, `SECRETARIA_ESTADO`, `SECRETARIA_MOVIL`, `SECRETARIA_CASA`, `SECRETARIA_CORREO`, `SECRETARIA_CLAVE_PROFESIONAL`,
            `SECRETARIA_ESPECIALIDAD`, `SECRETARIA_FECHA_ING`, `SECRETARIA_OBSERVACIONES`, `SECRETARIA_PWD`)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',
            [
                $informacion->ID_ADMIN,
                $informacion->ADMIN_CLAVE,
                $informacion->ADMIN_AP_PAT,
                $informacion->ADMIN_AP_MAT,
                $informacion->ADMIN_NOMBRE,
                $informacion->ADMIN_SEXO,
                $informacion->ADMIN_TIPO_SANGRE,
                $informacion->ADMIN_FECHA_NAC,
                $informacion->ADMIN_CALLE,
                $informacion->ADMIN_COLONIA,
                $informacion->ADMIN_MUNICIPIO,
                $informacion->ADMIN_ESTADO,
                $informacion->ADMIN_MOVIL,
                $informacion->ADMIN_CASA,
                $informacion->ADMIN_CORREO,
                $informacion->ADMIN_CLAVE_PROFESIONAL,
                $informacion->ADMIN_ESPECIALIDAD,
                $informacion->ADMIN_FECHA_ING,
                $informacion->ADMIN_OBSERVACIONES,
                $informacion->ADMIN_PWD

            ]

        );
        return back();
    }

    public function edit($id)
    {



        $selecadmin = Secretaria::where('ID_SECRETARIAL', $id)->get();



        return view('update/secretaria', compact('selecadmin'));
    }



    public function modificarsecre(Request $informacion, $id)

    {



        $selecalum = DB::table('secretarias')->where('ID_SECRETARIAL', $id)->update([

            'ID_SECRETARIAL' => $id,
            'SECRETARIA_CLAVE' => $informacion->ADMIN_CLAVE,
            'SECRETARIA_AP_PAT' => $informacion->ADMIN_AP_PAT,
            'SECRETARIA_AP_MAT' => $informacion->ADMIN_AP_MAT,
            'SECRETARIA_NOMBRE' => $informacion->ADMIN_NOMBRE,
            'SECRETARIA_SEXO' => $informacion->ADMIN_SEXO,
            'SECRETARIA_TIPO_SANGRE' => $informacion->ADMIN_TIPO_SANGRE,
            'SECRETARIA_FECHA_NAC' => $informacion->ADMIN_FECHA_NAC,
            'SECRETARIA_CALLE' => $informacion->ADMIN_CALLE,
            'SECRETARIA_COLONIA' => $informacion->ADMIN_COLONIA,
            'SECRETARIA_MUNICIPIO' => $informacion->ADMIN_MUNICIPIO,
            'SECRETARIA_ESTADO' => $informacion->ADMIN_ESTADO,
            'SECRETARIA_MOVIL' => $informacion->ADMIN_MOVIL,
            'SECRETARIA_CASA' => $informacion->ADMIN_CASA,
            'SECRETARIA_CORREO' => $informacion->ADMIN_CORREO,
            'SECRETARIA_CLAVE_PROFESIONAL' => $informacion->ADMIN_CLAVE_PROFESIONAL,
            'SECRETARIA_ESPECIALIDAD' => $informacion->ADMIN_ESPECIALIDAD,
            'SECRETARIA_FECHA_ING' => $informacion->ADMIN_FECHA_ING,
            'SECRETARIA_OBSERVACIONES' => $informacion->ADMIN_OBSERVACIONES,



        ]);






        return redirect()->route('secre.actualizado');
    }



    public function eliminarsecre($id)
    {

        DB::table('secretarias')->where('ID_SECRETARIAL', '=', $id)->delete();




        return redirect()->route('secre.actualizado');
    }
}
