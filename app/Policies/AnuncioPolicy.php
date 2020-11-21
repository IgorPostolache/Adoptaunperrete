<?php

namespace App\Policies;

use App\Anuncio;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnuncioPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any anuncios.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the anuncio.
     *
     * @param  \App\User  $user
     * @param  \App\Anuncio  $anuncio
     * @return mixed
     */
    public function view(User $user, Anuncio $anuncio)
    {
        return $user->id == $anuncio->user_id;
    }

    /**
     * Determine whether the user can create anuncios.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
       
        return $user->esVerificado() || $user->esAdministrador();
        
    }

    public function edit(User $user, Anuncio $anuncio)
    {
        return $user->id == $anuncio->user_id || $user->esAdministrador();
    }
    /**
     * Determine whether the user can update the anuncio.
     *
     * @param  \App\User  $user
     * @param  \App\Anuncio  $anuncio
     * @return mixed
     */
    public function update(User $user, Anuncio $anuncio)
    {
        return $user->id == $anuncio->user_id || $user->esAdministrador();
    }

    /**
     * Determine whether the user can delete the anuncio.
     *
     * @param  \App\User  $user
     * @param  \App\Anuncio  $anuncio
     * @return mixed
     */
    public function delete(User $user, Anuncio $anuncio)
    {
        return $user->id == $anuncio->user_id || $user->esAdministrador();
    }

    /**
     * Determine whether the user can restore the anuncio.
     *
     * @param  \App\User  $user
     * @param  \App\Anuncio  $anuncio
     * @return mixed
     */
    public function restore(User $user, Anuncio $anuncio)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the anuncio.
     *
     * @param  \App\User  $user
     * @param  \App\Anuncio  $anuncio
     * @return mixed
     */
    public function forceDelete(User $user, Anuncio $anuncio)
    {
        //
    }
}
