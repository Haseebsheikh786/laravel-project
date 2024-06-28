<x-layout>
    <x-slot:heading>Home Page</x-slot:heading>
    <div class="flex justify-center items-center">
        <form action="{{ route('note.store') }}" method="POST" class="note">
            @csrf
            <textarea name="note" class="note-body" placeholder="Enter your note here"></textarea>
                <button class="bg-blue-600 text-white p-2 text-end">Submit</button>
        </form>
    </div>
    @foreach ($notes as $note)
    <ul class="note">
        <li class="note-body">
            {{ Str::words($note->note, 30) }}
        </li>
        <li class="note-buttons">
            <a href="{{ route('note.show', $note) }}" class="note-edit-button">View</a>
            <a href="{{ route('note.edit', $note) }}" class="note-edit-button">Edit</a>
            <form action="{{ route('note.destroy', $note) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="note-delete-button">Delete</button>
            </form>
        </li>
    </ul>
    @endforeach
</x-layout>