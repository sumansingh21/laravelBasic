<x-layout>
        <x-header>Post Edit Page</x-header>
        <div class="max-w-2xl mx-auto p-4 bg-slate-200 dark:bg-slate-900 rounded-lg">
            {{-- @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <span class="text-red-500"> {{ $error }} </span>
                @endforeach
            @endif --}}
            <form method="POST" action="{{ route('posts.update', $posts->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-6">
                    <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Title
                    </label>
                    <input type="text" id="default-input" name="title" value="{{ old('title',$posts->title) }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('title')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                </div>
    
                <div class="mb-6">
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                        message</label>
                    <textarea id="message" rows="4" name="content"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Write your thoughts here...">{{ old('content', $posts->content) }}</textarea>
                        @error('content')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Thumbnail</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        id="thumbnail" name="thumbnail" type="file">
                        @error('thumbnail')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
    
                <div class="mb-6">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Update</button>
                </div>
            </form>
        </div>
</x-layout>