@extends('admin.layouts.main')

@section('container')
    <div class="pt-24">
        @include('admin.penduduk._breadcum')

        <div class="font-sans overflow-x-auto rounded-2xl mt-6 shadow-2xl">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-400 whitespace-nowrap">
                    <tr>
                        <th class="p-4 text-left text-xs font-semibold text-gray-800">
                            No
                        </th>
                        <th class="p-4 text-left text-xs font-semibold text-gray-800">
                            Nama
                        </th>
                        <th class="p-4 text-left text-xs font-semibold text-gray-800">
                            NIK
                        </th>
                        <th class="p-4 text-left text-xs font-semibold text-gray-800">
                            Alamat
                        </th>
                        <th class="p-4 text-left text-xs font-semibold text-gray-800">
                            Aksi
                        </th>
                    </tr>
                </thead>

                <tbody class="whitespace-nowrap">
                    @if ($data->count() > 0)
                        @foreach ($data as $no => $item)
                            <tr class="hover:bg-gray-50">
                                <td class="p-4 text-[15px] text-gray-800">
                                    {{ $no + 1 }}
                                </td>
                                <td class="p-4 text-[15px] text-gray-800">
                                    {{ $item->nama }}
                                </td>
                                <td class="p-4 text-[15px] text-gray-800">
                                    {{ $item->nik }}
                                </td>
                                <td class="p-4 text-[15px] text-gray-800">
                                    {{ $item->alamat }}
                                </td>
                                <td class="p-4">

                                    <button class="mr-4" title="Edit" title="Edit" aria-haspopup="dialog"
                                        aria-expanded="false" aria-controls="hs-scale-animation-modal{{ $no }}"
                                        data-hs-overlay="#hs-scale-animation-modal{{ $no }}">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-5 fill-blue-500 hover:fill-blue-700" viewBox="0 0 348.882 348.882">
                                            <path
                                                d="m333.988 11.758-.42-.383A43.363 43.363 0 0 0 304.258 0a43.579 43.579 0 0 0-32.104 14.153L116.803 184.231a14.993 14.993 0 0 0-3.154 5.37l-18.267 54.762c-2.112 6.331-1.052 13.333 2.835 18.729 3.918 5.438 10.23 8.685 16.886 8.685h.001c2.879 0 5.693-.592 8.362-1.76l52.89-23.138a14.985 14.985 0 0 0 5.063-3.626L336.771 73.176c16.166-17.697 14.919-45.247-2.783-61.418zM130.381 234.247l10.719-32.134.904-.99 20.316 18.556-.904.99-31.035 13.578zm184.24-181.304L182.553 197.53l-20.316-18.556L294.305 34.386c2.583-2.828 6.118-4.386 9.954-4.386 3.365 0 6.588 1.252 9.082 3.53l.419.383c5.484 5.009 5.87 13.546.861 19.03z"
                                                data-original="#000000" />
                                            <path
                                                d="M303.85 138.388c-8.284 0-15 6.716-15 15v127.347c0 21.034-17.113 38.147-38.147 38.147H68.904c-21.035 0-38.147-17.113-38.147-38.147V100.413c0-21.034 17.113-38.147 38.147-38.147h131.587c8.284 0 15-6.716 15-15s-6.716-15-15-15H68.904C31.327 32.266.757 62.837.757 100.413v180.321c0 37.576 30.571 68.147 68.147 68.147h181.798c37.576 0 68.147-30.571 68.147-68.147V153.388c.001-8.284-6.715-15-14.999-15z"
                                                data-original="#000000" />
                                        </svg>
                                    </button>
                                    <button class="mr-4" title="Delete" data-modal-target="popup-modal{{ $no }}"
                                        data-modal-toggle="popup-modal{{ $no }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 fill-red-500 hover:fill-red-700"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M19 7a1 1 0 0 0-1 1v11.191A1.92 1.92 0 0 1 15.99 21H8.01A1.92 1.92 0 0 1 6 19.191V8a1 1 0 0 0-2 0v11.191A3.918 3.918 0 0 0 8.01 23h7.98A3.918 3.918 0 0 0 20 19.191V8a1 1 0 0 0-1-1Zm1-3h-4V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v2H4a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM10 4V3h4v1Z"
                                                data-original="#000000" />
                                            <path
                                                d="M11 17v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Zm4 0v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Z"
                                                data-original="#000000" />
                                        </svg>
                                    </button>

                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-center py-16">
                                <div class="flex flex-col items-center justify-center">
                                    <svg class="w-24 h-24 text-gray-300 mb-4" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z">
                                        </path>
                                    </svg>
                                    <p class="text-gray-500 text-lg font-medium">Belum ada data</p>
                                    <p class="text-gray-400 text-sm mt-1">Silakan tambahkan data penduduk baru</p>
                                </div>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        @foreach ($data as $no => $delete)
            <div id="popup-modal{{ $no }}" tabindex="-1"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <form action="penduduk/delete/{{ $delete->warga_id }}" method="post">
                    @csrf
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <div class="relative bg-white rounded-lg shadow-sm">
                            <button type="button"
                                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                                data-modal-hide="popup-modal{{ $no }}">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="p-4 md:p-5 text-center">
                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 " aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <h3 class="mb-5 text-lg font-normal text-gray-500 ">apakah kamu yakin ingin mengahapus data
                                    ini ?</h3>
                                <button data-modal-hide="popup-modal" type="submit"
                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 rounded-lg text-sm inline-flex font-semibold items-center px-5 py-2.5 text-center">
                                    iya, lanjutkan
                                </button>
                                <button data-modal-hide="popup-modal" type="button"
                                    class="py-2.5 px-5 ms-3 text-sm text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 font-semibold">tidak,
                                    batalkan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        @endforeach


        <!-- Modal for editing address -->
        @foreach ($data as $key => $update)
            <!-- Modal for editing address -->
            <div id="hs-scale-animation-modal{{ $key }}"
                class="hs-overlay hidden w-full h-full fixed top-0 left-0 z-[60] overflow-x-hidden overflow-y-auto">
                <div
                    class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
                    <div class="flex flex-col bg-white border shadow-sm rounded-xl">
                        <div class="flex justify-between items-center py-3 px-4 border-b">
                            <h3 class="font-bold text-gray-800">
                                Edit Alamat
                            </h3>
                            <button type="button"
                                class="hs-dropdown-toggle inline-flex flex-shrink-0 justify-center items-center h-8 w-8 rounded-md text-gray-500 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-white transition-all text-sm"
                                data-hs-overlay="#hs-scale-animation-modal">
                                <span class="sr-only">Close</span>
                                <svg class="w-3.5 h-3.5" width="8" height="8" viewBox="0 0 8 8" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0.258206 1.00652C0.351976 0.912791 0.479126 0.860131 0.611706 0.860131C0.744296 0.860131 0.871447 0.912791 0.965207 1.00652L3.61171 3.65302L6.25822 1.00652C6.30432 0.958771 6.35952 0.920671 6.42052 0.894471C6.48152 0.868271 6.54712 0.854471 6.61352 0.853901C6.67992 0.853321 6.74572 0.865971 6.80722 0.891111C6.86862 0.916251 6.92442 0.953381 6.97142 1.00032C7.01832 1.04727 7.05552 1.1031 7.08062 1.16454C7.10572 1.22599 7.11842 1.29183 7.11782 1.35822C7.11722 1.42461 7.10342 1.49022 7.07722 1.55122C7.05102 1.61222 7.01292 1.6674 6.96522 1.71352L4.31871 4.36002L6.96522 7.00648C7.05632 7.10078 7.10672 7.22708 7.10552 7.35818C7.10442 7.48928 7.05182 7.61468 6.95912 7.70738C6.86642 7.80018 6.74102 7.85268 6.60992 7.85388C6.47882 7.85498 6.35252 7.80458 6.25822 7.71348L3.61171 5.06702L0.965207 7.71348C0.870907 7.80458 0.744606 7.85498 0.613506 7.85388C0.482406 7.85268 0.357007 7.80018 0.264297 7.70738C0.171597 7.61468 0.119017 7.48928 0.117877 7.35818C0.116737 7.22708 0.167126 7.10078 0.258206 7.00648L2.90471 4.36002L0.258206 1.71352C0.164476 1.61976 0.111816 1.4926 0.111816 1.36002C0.111816 1.22744 0.164476 1.10028 0.258206 1.00652Z"
                                        fill="currentColor" />
                                </svg>
                            </button>
                        </div>
                        <form action="{{ route('penduduk.update', $item->warga_id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="p-4 overflow-y-auto">
                                <div class="mb-4">
                                    <label for="alamat"
                                        class="block mb-2 text-sm font-medium text-gray-900">Alamat</label>
                                    <textarea id="alamat" name="alamat" rows="4"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('alamat') border-red-500 @enderror">{{ old('alamat', $item->alamat) }}</textarea>
                                    @error('alamat')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t">
                                <button type="button"
                                    class="py-2.5 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100"
                                    data-hs-overlay="#hs-scale-animation-modal">
                                    Batal
                                </button>
                                <button type="submit"
                                    class="py-2.5 px-4 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300">
                                    Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection
