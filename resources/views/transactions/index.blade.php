<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transactions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-6">
                        <a href="{{ route('transactions.form') }}"
                           class="px-4 py-2 bg-green-600 hover:bg-green-500 text-white rounded-md shadow-sm focus:outline-none">
                            +
                        </a>
                    </div>
                    <form method="GET" action="#" class="mb-6">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label for="month" class="block text-sm font-medium text-gray-300">Mês</label>
                                <select id="month" name="month" class="mt-1 block w-full bg-gray-700 border border-gray-600 text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                    <option value="" disabled selected>Selecione um mês</option>
                                    @foreach($months as $key => $month)
                                        <option value="{{ $key }}">{{ $month }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Campo Ano -->
                            <div>
                                <label for="year" class="block text-sm font-medium text-gray-300">Ano</label>
                                <input type="number" id="year" name="year" placeholder="Ex: 2025"
                                       class="mt-1 block w-full bg-gray-700 border border-gray-600 text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>

                        <!-- Botão de Pesquisa -->
                        <div class="mt-4">
                            <button type="submit"
                                    class="px-4 py-2 bg-blue-600 hover:bg-blue-500 text-white rounded-md shadow-sm focus:outline-none">
                                Pesquisar
                            </button>
                        </div>
                    </form>

                    <!-- Tabela -->
                    <table class="table-auto w-full border border-gray-700 text-gray-300">
                        <thead class="bg-gray-800">
                        <tr>
                            <th class="border border-gray-700 px-4 py-2 text-left">#</th>
                            <th class="border border-gray-700 px-4 py-2 text-left">Type</th>
                            <th class="border border-gray-700 px-4 py-2 text-left">Date</th>
                            <th class="border border-gray-700 px-4 py-2 text-left">Month</th>
                            <th class="border border-gray-700 px-4 py-2 text-left">Year</th>
                            <th class="border border-gray-700 px-4 py-2 text-left">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transactions as $transaction)
                            <tr class="odd:bg-gray-900 even:bg-gray-800 hover:bg-gray-700">
                                <td class="border border-gray-700 px-4 py-2">{{$transaction->getKey()}}</td>
                                <td class="border border-gray-700 px-4 py-2">{{$transaction->type_label}}</td>
                                <td class="border border-gray-700 px-4 py-2">{{$transaction->date->format('d/m/Y')}}</td>
                                <td class="border border-gray-700 px-4 py-2">{{$transaction->month_name}}</td>
                                <td class="border border-gray-700 px-4 py-2">{{$transaction->year}}</td>
                                <td class="border border-gray-700 px-4 py-2">
                                    <a href="#" class="text-blue-400 hover:text-blue-300">Editar</a>
                                    <button class="text-red-400 hover:text-red-300 ml-2" onclick="alert('Deletar?')">Deletar</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
