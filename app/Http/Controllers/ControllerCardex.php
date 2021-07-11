<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Calificacion;
use App\Models\Cardex;
use App\Models\Docente;
use App\Models\Grupo;
use App\Models\Modulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerCardex extends Controller
{

    public function mostcardex()
    {
        //para llenar tabla
        $seleccardex = Cardex::select(

            'cardexes.*',
            'docentes.*',
            'grupos.*',
            'alumnos.*',
        )
            ->join('alumnos', 'alumnos.ID_ALUMNO', '=', 'cardexes.CARDEX_ID_ALUMNO')
            ->join('docentes',  'docentes.ID_DOCENTE', '=', 'cardexes.CARDEX_ID_DOCENTE')
            ->join('grupos',  'grupos.ID_GRUPO_NOMBRE', '=', 'cardexes.CARDEX_ID_GRUPO_NOMBRE')
            ->get();
        $selecalum = Alumno::select(

            'ALUMNO_NOMBRE',
            'ALUMNO_APELLIDO_MAT',
            'ALUMNO_APELLIDO_PAT',
            'ID_ALUMNO',

        )->get();
        $selecgrupo = Grupo::select('ID_GRUPO_NOMBRE')->get();
        $selecplan = DB::table('plan_estudios')->get();
        $selecmodulo = Modulo::select('ID_MODULO')->get();
        $selecdocente = Docente::select(
            'ID_DOCENTE',
            'DOCENTE_NOMBRE',
            'DOCENTE_AP_MAT',
            'DOCENTE_AP_PAT',
        )->get();
        $seleccalificacion = Calificacion::select('ID_CALIFICACION')->get();


        return view('cardex', compact('seleccardex', 'selecalum', 'selecgrupo', 'selecplan', 'selecmodulo', 'selecdocente', 'seleccalificacion'));
    }


    public function agregacardex(Request $informacion)
    {



        DB::insert(



            'INSERT INTO `cardexes` (`ID_CARDEX`, `CARDEX_ID_ALUMNO`, `CARDEX_ID_GRUPO_NOMBRE`, 
            `CARDEX_ID_PLANESTUDIO`, `CARDEX_ID_MODULO`, `CARDEX_ID_DOCENTE`, `CARDEX_FECHA`, 
            `CARDEX_ID_CALIFICACION`, `CAR_CAL`, `CAR_PER_C`, `CAR_ACR`) 
            VALUES (?,?,?,?,?,?,?,?,?,?,?)',
            [

                $informacion->ID_CARDEX,
                $informacion->CARDEX_ID_ALUMNO,
                $informacion->CARDEX_ID_GRUPO_NOMBRE,
                $informacion->CARDEX_ID_PLANESTUDIO,
                $informacion->CARDEX_ID_MODULO,
                $informacion->CARDEX_ID_DOCENTE,
                $informacion->CARDEX_FECHA,
                $informacion->CARDEX_ID_CALIFICACION,
                $informacion->CAR_CAL,
                $informacion->CAR_PER_C,
                $informacion->CAR_ACR,

            ]
        );



        return back();
    }


    //dif
    public function edit($id)
    {

        $selecalum = Alumno::select(

            'ALUMNO_NOMBRE',
            'ALUMNO_APELLIDO_MAT',
            'ALUMNO_APELLIDO_PAT',
            'ID_ALUMNO',

        )->get();
        $selecgrupo = Grupo::select('ID_GRUPO_NOMBRE')->get();
        $selecplan = DB::table('plan_estudios')->get();
        $selecmodulo = Modulo::select('ID_MODULO')->get();
        $selecdocente = Docente::select(
            'ID_DOCENTE',
            'DOCENTE_NOMBRE',
            'DOCENTE_AP_MAT',
            'DOCENTE_AP_PAT',
        )->get();
        $seleccalificacion = Calificacion::select('ID_CALIFICACION')->get();

        $seleccardex = Cardex::where('ID_CARDEX', $id)
            ->join('alumnos', 'alumnos.ID_ALUMNO', '=', 'cardexes.CARDEX_ID_ALUMNO')
            ->join('docentes',  'docentes.ID_DOCENTE', '=', 'cardexes.CARDEX_ID_DOCENTE')
            ->join('grupos',  'grupos.ID_GRUPO_NOMBRE', '=', 'cardexes.CARDEX_ID_GRUPO_NOMBRE')
            ->join('plan_estudios',  'plan_estudios.ID_PLANESTUDIO', '=', 'cardexes.CARDEX_ID_PLANESTUDIO')
            ->join('modulos',  'modulos.ID_MODULO', '=', 'cardexes.CARDEX_ID_MODULO')
            ->join('calificacions',  'calificacions.ID_CALIFICACION', '=', 'cardexes.CARDEX_ID_CALIFICACION')
            ->select(
                'cardexes.*',
                'docentes.*',
                'grupos.*',
                'alumnos.*',
                'plan_estudios.*',
                'modulos.*',
                'calificacions.*'
            )
            ->get();




        return view('update/cardex', compact('seleccardex', 'selecalum', 'selecgrupo', 'selecplan', 'selecmodulo', 'selecdocente', 'seleccalificacion'));
    }



    public function modificaradmin(Request $informacion, $id)

    {



        $selecalum = DB::table('administradors')->where('ID_ADMIN', $id)->update([



            'ID_ADMIN' => $id,
            'ADMIN_CLAVE' => $informacion->ADMIN_CLAVE,
            'ADMIN_AP_PAT' => $informacion->ADMIN_AP_PAT,
            'ADMIN_AP_MAT' => $informacion->ADMIN_AP_MAT,
            'ADMIN_NOMBRE' => $informacion->ADMIN_NOMBRE,
            'ADMIN_SEXO' => $informacion->ADMIN_SEXO,
            'ADMIN_TIPO_SANGRE' => $informacion->ADMIN_TIPO_SANGRE,
            'ADMIN_FECHA_NAC' => $informacion->ADMIN_FECHA_NAC,
            'ADMIN_CALLE' => $informacion->ADMIN_CALLE,
            'ADMIN_COLONIA' => $informacion->ADMIN_COLONIA,
            'ADMIN_MUNICIPIO' => $informacion->ADMIN_MUNICIPIO,
            'ADMIN_ESTADO' => $informacion->ADMIN_ESTADO,
            'ADMIN_MOVIL' => $informacion->ADMIN_MOVIL,
            'ADMIN_CASA' => $informacion->ADMIN_CASA,
            'ADMIN_CORREO' => $informacion->ADMIN_CORREO,
            'ADMIN_CLAVE_PROFESIONAL' => $informacion->ADMIN_CLAVE_PROFESIONAL,
            'ADMIN_ESPECIALIDAD' => $informacion->ADMIN_ESPECIALIDAD,
            'ADMIN_FECHA_ING' => $informacion->ADMIN_FECHA_ING,
            'ADMIN_OBSERVACIONES' => $informacion->ADMIN_OBSERVACIONES,




        ]);






        return redirect()->route('admin.actualizado');
    }



    public function eliminaradmin($id)
    {

        DB::table('administradors')->where('ID_ADMIN', '=', $id)->delete();




        return redirect()->route('admin.actualizado');
    }
}
