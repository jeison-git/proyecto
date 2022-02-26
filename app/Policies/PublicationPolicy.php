<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Publication;
use Illuminate\Auth\Access\HandlesAuthorization;

class PublicationPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
    }
        public function enrolled(User $user, Publication $publication){
            return $publication->users->contains($user->id);

        }

        public function published(?User $user, Publication $publication){
            if($publication->status == 3){
                return true;
            }else{
                return false;
            }
        }

        public function dicatated(User $user, Publication $publication){
            if($publication->user_id == $user->id){
                return true;
            }else{
                return false;
            }
        }

        public function revision(User $user, Publication $publication){
            if($publication->status ==2){
                return true;
            }else{
                return false;
            }
        }


}
