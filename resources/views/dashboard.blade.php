<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cidades') }}
        </h2>
    </x-slot>

    <div class="mt-6">
        <div class="px-4">
            <form class="py-2" action="{{ route('cidade.store') }}" method="POST">
                @csrf
                <x-text-input type="text" name="nome" placeholder="Nome da cidade"></x-text-input>
                <x-text-input type="text" name="estado" placeholder="Estado"></x-text-input>
                <x-text-input type="text" name="populacao" placeholder="População"></x-text-input>
                <x-text-input type="text" name="pib" placeholder="PIB per capita"></x-text-input>
                <x-text-input type="text" name="idh" placeholder="IDH"></x-text-input>
                <x-primary-button class="bg-blue-500 hover:bg-blue-600"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                    <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                  </svg>
                  Adicionar</x-primary-button>
            </form>
            <div>
                @foreach (Auth::user()->cidades as $cidade)
                    <div class="flex justify-between grid grid-cols-6 divide-x py-1" x-data="{ showDelete: false, showEdit: false }">
                        <div class="border px-4 py-2">{{ $cidade->nome }}</div>
                        <div class="border px-4 py-2">{{ $cidade->estado }}</div>
                        <div class="border px-4 py-2">{{ $cidade->populacao }}</div>
                        <div class="border px-4 py-2">{{ $cidade->pib }}</div>
                        <div class="border px-4 py-2">{{ $cidade->idh }}</div>
                        <div>
                            <x-primary-button @click="showEdit = true"><svg xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                                Editar</x-primary-button>
                            <x-danger-button @click="showDelete = true"><svg xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                                Excluir</x-danger-button>
                        </div>
                        <div x-show="showDelete"
                            class="absolute top-0 bottom-0 left-0 right-0 bg-gray-900 bg-opacity-20 z-0">
                            <div class="w-96 bg-white p-4 absolute left-1/4 right-1/4 top-1/4 z-10">
                                <form action="{{ route('cidade.destroy', $cidade) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <h2 class="font-bold py-1">Tem certeza que deseja excluir?</h2>
                                    <x-danger-button @click="showDelete = true">Sim</x-danger-button>
                                </form>
                                <x-primary-button @click="showDelete = false">Cancelar</x-primary-button>
                            </div>
                        </div>
                        <div x-show="showEdit"
                            class="absolute top-0 bottom-0 left-0 right-0 bg-gray-900 bg-opacity-20 z-0">
                            <div class="w-96 bg-white p-4 absolute left-1/4 right-1/4 top-1/4 z-10">
                                <form action="{{ route('cidade.update', $cidade) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <x-text-input name="nome" value="{{ $cidade->nome }}"></x-text-input>
                                    <x-text-input name="estado" value="{{ $cidade->estado }}"></x-text-input>
                                    <x-text-input name="populacao" value="{{ $cidade->populacao }}"></x-text-input>
                                    <x-text-input name="pib" value="{{ $cidade->pib }}"></x-text-input>
                                    <x-text-input name="idh" value="{{ $cidade->idh }}"></x-text-input>
                                    <x-primary-button class="bg-green-600 hover:bg-green-700">Salvar</x-primary-button>
                                </form>
                                <x-primary-button @click="showEdit = false">Cancelar</x-primary-button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>