<x-layout layout>
  <x-slot:heading></x-slot:heading>

  <div class="note-container w-[500px] mt-10 mx-auto single-note bg-gray-100 rounded shadow-sm p-4">
    <div class="note-header flex justify-between items-center border-b border-gray-200 pb-4">
      <h1 class="text-2xl font-medium text-gray-800">Author: {{ $note->user_name }}</h1>
      <div class="note-buttons flex space-x-2">
        <a href="{{ route('note.edit', $note) }}" class="text-blue-500 hover:underline">Edit</a>
        <form action="{{ route('note.destroy', $note) }}" method="POST" class="flex items-center">
          @csrf
          @method('DELETE')
          <button type="submit" class="text-red-500 hover:underline">Delete</button>
        </form>
      </div>
    </div>
    <div class="note-body">
      <p class="text-lg text-gray-700">{{ $note->note }}</p>
    </div>
    <div class="note-icons flex space-x-3 mt-4">
      <div>
        <!-- <i class="fas fa-regular fa-heart text-red-600"></i> -->
        <i class="fas fa-light fa-heart "></i>
      </div>
      <div>
        <i class="fas fa-comment"></i>  
      </div>
    </div>

  </div>
</x-layout>
