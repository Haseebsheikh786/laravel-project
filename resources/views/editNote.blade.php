<x-layout layout>
  <x-slot:heading></x-slot:heading>

  <div class="note-container single-note bg-white rounded shadow-sm p-4">
    <h1 class="text-2xl font-medium text-gray-800">Edit your note</h1>
    <form action="{{ route('note.update', $note) }}" method="POST" class="space-y-4">
      @csrf
      @method('PUT')
      <textarea name="note" rows="10" class="note-body w-full h-64 border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="Enter your note here">{{ $note->note }}</textarea>
      <div class="note-buttons flex justify-end space-x-4">
        <a href="{{ route('note.index') }}" class="text-gray-500 hover:underline mt-2">Cancel</a>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
      </div>
    </form>
  </div>
</x-layout>
