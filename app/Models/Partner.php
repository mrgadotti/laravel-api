<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $table = 'socios';

    public const CREATED_AT = 'dt_socio';
    // public const UPDATED_AT = null;
    // public $timestamps = false;
    protected $primaryKey = 'cd_socio';
    public $incrementing = true;
    protected $fillable = [
        'nr_cpf',
        'nr_rg',
        'nm_socio',
        'ds_endereco',
        'ds_numero',
        'ds_complemento',
        'ds_bairro',
        'nm_cidade',
        'nr_cep',
        'dt_socio',
        'in_situacao',
        'dt_nascimento',
        'nr_fone',
        'nr_fone_comercial',
        'nr_celular',
        'ds_email',
        'ds_email_responsavel',
        'ds_imagem',
        'cd_classe',
        'cd_curso',
        'cd_escola',
        'cd_itinerario_ida',
        'cd_itinerario_volta',
        'in_turno',
        'nr_segunda',
        'nr_terca',
        'nr_quarta',
        'nr_quinta',
        'nr_sexta',
        'nr_sabado',
        'cd_ida',
        'cd_volta',
        'qt_viagem',
        'qt_viagem_ida',
        'qt_viagem_volta',
        'ds_senha',
        'in_fiscal',
        'in_turno_seg_ida',
        'in_turno_seg_volta',
        'in_turno_ter_ida',
        'in_turno_ter_volta',
        'in_turno_qua_ida',
        'in_turno_qua_volta',
        'in_turno_quin_ida',
        'in_turno_quin_volta',
        'in_turno_sex_ida',
        'in_turno_sex_volta',
        'in_turno_sab_ida',
        'in_turno_sab_volta',
        'cd_itinerario_ida_seg',
        'cd_itinerario_volta_seg',
        'cd_itinerario_ida_ter',
        'cd_itinerario_volta_ter',
        'cd_itinerario_ida_qua',
        'cd_itinerario_volta_qua',
        'cd_itinerario_ida_quin',
        'cd_itinerario_volta_quin',
        'cd_itinerario_ida_sex',
        'cd_itinerario_volta_sex',
        'cd_itinerario_ida_sab',
        'cd_itinerario_volta_sab'
    ];
}
