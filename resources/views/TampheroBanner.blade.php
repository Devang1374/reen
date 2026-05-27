<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hero-Banner') }}
        </h2>
    </x-slot>

        @if (session('status'))
            <div class="msg-box">
                {{ session('status') }}
            </div>
        @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="inputs">
                        <div class="input-box max-w-7xl mx-auto sm:px-6 lg:px-8 overflow-hidden shadow-sm sm:rounded-lg">
                            <form action="{{route('addHeroBanner')}}" method="post" class="p-6 text-gray-900" enctype="multipart/form-data">
                                @csrf
                                <div><x-input-label for="title" :value="__('Titile:')" /> <x-text-input type="text" id="title" name="title" placeholder="Enter Title" /></div>
                                <div><x-input-label for="caption" :value="__('Caption:')" /><x-text-input type="text" id="caption" name="caption" placeholder="Enter caption" /></div>
                                <x-input-label for="btn-text" :value="__('Button Text:')" /><x-text-input type="text" id="button-text" name="btn-text" placeholder="Enter Text For Button" />
                                <x-input-label for="btn-url" :value="__('Button Url:')"/><x-text-input type="text" id="button-url" name="btn-url" placeholder="Enter Url From Button" />
                                <div class="input-wrapper"><x-input-label for="imageFile" :value="__('Image File')" /><input type="file" id="image-file" name="imageFile"></div>
                                <x-primary-button type="submit">ADD</x-primary-button>
                                <x-primary-button type="reset" onclick="cancel()">cancel</x-primary-button>
                            </form>
                        </div>
                        <div class="addBox flex max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            <x-primary-button class="ms-3" onclick="showInput()">ADD </x-primary-button>
                        </div>

                    </div>
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 overflow-hidden shadow-sm sm:rounded-lg">
                        <table>
                            <tr>
                                <th>ID</th>
                                <th>Tilte</th>
                                <th>Caption</th>
                                <th>Button-Text</th>
                                <th>Button-Url</th>
                                <th>Image-Path</th>
                                <th>Remove</th>
                                <th>Update</th>
                            </tr>

                            @php
                                $couter = 0;
                            @endphp
                            @foreach ($heros as $hero)
                            <tr>
                                <td>{{++$couter}}</td>
                                <td>{{$hero['title']}}</td>
                                <td>{{$hero['caption']}}</td>
                                <td>{{$hero['btn-text']}}</td>
                                <td>{{$hero['btn-url']}}</td>
                                <td>{{$hero['file-path']}}</td>
                                @php
                                    $id = $hero['id'];
                                @endphp
                                <td>
                                    <form action="{{ route('deleteHeroBanner', ['id'=>$id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <x-primary-button type="submit">X</x-primary-button>
                                    </form>
                                </td>
                                <td>
                                    <x-primary-button onclick="showUpdateForm({{$hero['id']}})">🖊</x-primary-button>
                                    <div class="update-form form-{{$hero['id']}} max-w-7xl mx-auto sm:px-6 lg:px-8 overflow-hidden shadow-sm sm:rounded-lg">
                                    <form action="{{route('updateHeroBanner',['id'=>$id])}}" class="p-6 text-gray-900" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <x-input-label for="title" :value="__('title')"/> <x-text-input type="text" id="title" name="title" placeholder="Enter Title" value="{{$hero['title']}}" />
                                        <x-input-label for="caption" :value="__('caption')"/><x-text-input type="text" id="caption" name="caption" placeholder="Enter caption" value="{{$hero['caption']}}" />
                                        <x-input-label for="button-text" :value="__('button-text')"/><x-text-input type="text" id="button-text" name="btn-text" placeholder="Enter Text For Button" value="{{$hero['btn-text']}}" />
                                        <x-input-label for="button-url" :value="__('button-url')"/><x-text-input type="text" id="button-url" name="btn-url" placeholder="Enter Url From Button" value="{{$hero['btn-url']}}" />
                                        <div class="input-wrapper"><img src="http://127.0.0.1:8000/storage/{{$hero['file-path']}}" alt=""><x-input-label for="image-file">Add Hero Image:</x-input-label><input type="file" id="image-file" name="imageFile" placeholder="new Imaege"></div>
                                        <x-primary-button type="submit" class="block">ADD</x-primary-button>
                                        <x-primary-button type="reset" onclick="cancelUpdate({{$hero['id']}})">cancel</x-primary-button>
                                    </form>     
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
