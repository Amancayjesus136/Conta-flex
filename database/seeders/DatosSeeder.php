<?php

namespace Database\Seeders;
use App\Models\Usuario;
use App\Models\Placa;
use Illuminate\Database\Seeder;

class DatosSeeder extends Seeder
{
    public function run()
    {
        $data = [
            // Datos del usuario
            "propietario" => "LUNNA LUANA SAC",
            "descripcion" => "ULTIMO PROPIETARIO",
            "tipo_documento" => "PARTIDA REGISTRAL",
            "documento" => "13049611",
            "direccion" => "CALLE TOMASAL 306",

            // Datos del vehículo (placa)
            "placa" => "D9D609",
            "tarjeta" => "1008243201",
            "fecha" => "23 Ene 2023",
            "serie" => "3HGRM3830DG602076",
            "marca" => "HONDA",
            "titulo_Anio" => "2023",
            "titulo_nro" => "206503",
            "tipo_propietario" => "PERSONA JURIDICA",
            "modelo" => "CR-V",
            "combustible" => "BI COMB. GLP",
            "carroceria" => "SUV",
            "motor" => "K24Z92512886",
            "anio" => "2013",
            "clase" => "CMTA RURAL",
            "color" => "NEGRO CRYSTAL",
            "cilindros" => "4",
            "asientos" => "5",
            "longitud" => "4.53",
            "ancho" => "1.82",
            "altura" => "1.65",
            "peso_bruto" => "2.04",
            "estado" => "EN CIRCULACION"
        ];

        // Insertar datos en la tabla "usuarios"
$usuario = new Usuario();
$usuario->propietario = $data['propietario'];
$usuario->descripcion = $data['descripcion'];
$usuario->tipo_documento = $data['tipo_documento'];
$usuario->documento = $data['documento'];
$usuario->direccion = $data['direccion']; // Asegúrate de que la dirección también se esté asignando correctamente
// Completa los demás campos del usuario
$usuario->save();

// Insertar datos en la tabla "placas"
$placa = new Placa();
// Asigna los datos correspondientes a la placa
$placa->placa = $data['placa'];
$placa->tarjeta = $data['tarjeta'];
$placa->fecha = $data['fecha'];
$placa->serie = $data['serie'];
$placa->marca = $data['marca'];
$placa->titulo_Anio = $data['titulo_Anio'];
$placa->titulo_nro = $data['titulo_nro'];
$placa->tipo_propietario = $data['tipo_propietario'];
$placa->modelo = $data['modelo'];
$placa->combustible = $data['combustible'];
$placa->carroceria = $data['carroceria'];
$placa->motor = $data['motor'];
$placa->anio = $data['anio'];
$placa->clase = $data['clase'];
$placa->color = $data['color'];
$placa->cilindros = $data['cilindros'];
$placa->asientos = $data['asientos'];
$placa->longitud = $data['longitud'];
$placa->ancho = $data['ancho'];
$placa->altura = $data['altura'];
$placa->peso_bruto = $data['peso_bruto'];
$placa->estado = $data['estado'];
// Completa los demás campos de la placa
$placa->save();

// Asignar el ID de la placa al usuario
$usuario->placa_id = $placa->id;
$usuario->save();

    }
}
