<x-layout>
    <x-slot:heading></x-slot:heading>
    <div class="flex justify-center items-center">
  <form action="{{ route('note.store') }}" method="POST" class="w-full flex flex-col justify-center max-w-md bg-white rounded shadow-sm p-4">
    @csrf
    <textarea name="note" class="note-body w-full h-24 border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="Enter your note here"></textarea>
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2">Submit</button>
  </form>
</div>

    @foreach ($notes as $note)
  <ul class="note rounded border my-5 w-96 mx-auto overflow-hidden shadow">

    <p class="pt-2 px-3">  {{ $note->user_name }}</p>
    <li class="note-body px-4 py-3 hover:bg-gray-200 text-center">
      {{ Str::words($note->note, 30) }}
    </li>
    <li class="note-buttons flex justify-center px-4 py-2">
      <a href="{{ route('note.show', $note) }}" class="text-blue-500 hover:underline">View</a>
      <a href="{{ route('note.edit', $note) }}" class="text-blue-500 ml-4 hover:underline">Edit</a>
      <form action="{{ route('note.destroy', $note) }}" method="POST" class="ml-4">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-red-500 hover:underline">Delete</button>
      </form>
    </li>
  </ul>
@endforeach

</x-layout>