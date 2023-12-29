<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mockery\Exception;
use function Laravel\Prompts\password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->query('per_page');
        $usersPaginated = User::paginate($perPage);
        $usersPaginated->appends([
            'per_page' => $perPage
        ]);
        return response()->json($usersPaginated);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        try {
            $newUser = $request->all();
            $newUser['password'] = password_hash(
                $newUser['password'],
                PASSWORD_DEFAULT
            );
            $response = [
                'mensagem' => 'Usuario cadastrado com sucesso!!',
                'user'=> User::create($newUser)
            ];
            $status = 200;
     } catch (Exception $error){
            $status = 500;
            $response = ['error' => $error->getMessage()];
        }
        return response()->json($response,$status);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        if (auth()->user()->id == $user->id) {
            return response()->json(['user' => $user]);
        } else {
            return response()->json(['error' => 'Acesso não autorizado.'], 403);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $statusHttp = 500;
        if (auth()->user()->id == $user->id) {
            try {
                $userParams = $request->all();
                $userParams['password'] = Hash::make($request->password);
                $updatedUser = User::findOrFail($user->id);

                $updatedUser->update($userParams);
                if (!$updatedUser)
                    throw new Exception("Erro ao atualizar usuário!");
                return response()->json([
                    'message' => 'Usuário atualizado com sucesso!',
                    'user' => $updatedUser
                ]);
            } catch (Exception $e) {
                return response()->json([
                    'message' => 'Usuário não foi atualizado!',
                    'erro' => $e->getMessage()
                ], $statusHttp);
            }
        } else {
            return response()->json(['error' => 'Acesso não autorizado.'], 403);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $statusHttp = 500;
        try {
            $removedUser = User::findOrFail($user->id)->delete();
            if (!$removedUser)
                throw new Exception("Erro ao excluir usuário!");
            return response()->json([
                'message' => 'Usuário excluído com sucesso!',
                'user' => $removedUser
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Usuário não foi excluído!',
                'erro' => $e->getMessage()
            ], $statusHttp);
        }
    }
}
