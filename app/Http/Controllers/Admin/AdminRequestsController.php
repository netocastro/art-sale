<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Art;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class AdminRequestsController extends Controller
{
    public function uploadStore(Request $request)
    {
        $filterEmptyFields = array_keys($request->all(), '');

        $filterEmptyFields = array_values(array_diff($filterEmptyFields, ["discount", 'price_per_person']));

        if ($filterEmptyFields) {
            echo json_encode(['emptyFields' => $filterEmptyFields]);
            return;
        }

        $validateFields = [];

        foreach ($_FILES as $key => $value) {
            if (empty($value['name'])) {
                $validateFields[$key] = 'Por favor selecione uma imagem';
            }
        }

        if (Art::where('name', $request->name)->exists()) {
            $validateFields['name'] = 'Nome ja está sendo utilizado';
        }

        if (Art::where('description', $request->description)->exists()) {
            $validateFields['description'] = 'Descrição ja está sendo utilizado';
        }

        if ($request->discount > 100 || $request->discount < 0) {
            $validateFields['description'] = 'Valor de desconto de 0 a 100%';
        }

        /** faltam lgumas vaidacoes como, so aceita numero, remover caracteres especiais
         * entre outras coisas
         */

        if ($validateFields) {
            echo json_encode(['validateFields' => $validateFields]);
            return;
        }

        $fileName = $request->name . "." . $request->file('art')->extension();
        $uploaded = '';

        if ($request->hasFile('art') && $request->file('art')->isValid()) {
            $uploaded = $request->file('art')->storeAs('/arts/1', str_replace(' ', '-', $fileName)); // aqui fica o id do usuario da sessão
            if (!$uploaded) {
                return 'erro ao salvar arquivo';
            }
        }

        $art = new Art();

        $art->name = $request->name;
        $art->category_id = $request->category;
        $art->user_id = '1'; // aqui fica o id do usuario da sessão
        $art->directory = $uploaded;
        $art->price = $request->price;
        $art->description = $request->description;
        $art->discount = (!empty($request->discount) ? $request->discount : 0);
        $art->price_per_person = (!empty($request->price_per_person) ? $request->price_per_person : 0);

        $save = $art->save();

        if (!$save) {
            return 'error';
        }
        return json_encode(['success' => 'Art salva com sucesso!']);
    }
}
