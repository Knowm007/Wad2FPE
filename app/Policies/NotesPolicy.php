<?php

namespace App\Policies;

use App\Models\Note;
use App\Models\User;

class NotesPolicy
{
    /**
     * Determine whether the user can view the note.
     */
    public function view(User $user, Note $note)
    {
        return $user->id === $note->user_id;
    }

    /**
     * Determine whether the user can create notes.
     */
    public function create(User $user)
    {
        return true; // Lahat ng authenticated users ay pwedeng gumawa ng note
    }

    /**
     * Determine whether the user can update the note.
     */
    public function update(User $user, Note $note)
    {
        return $user->id === $note->user_id;
    }

    /**
     * Determine whether the user can delete the note.
     */
    public function delete(User $user, Note $note)
    {
        return $user->id === $note->user_id;
    }
}
