@extends('admin.layouts.main')

@section('container')
    <div class="pt-24">
        @include('admin.arsip._breadcum')

        <div class="font-sans overflow-x-auto rounded-2xl mt-6 shadow-2xl">
            @if($surat->count() > 0)
            <table class="min-w-full bg-white">

                <thead class="bg-gray-400 whitespace-nowrap">
                    <tr>
                        <th class="p-4 text-left text-xs font-semibold text-gray-800">
                            No
                        </th>
                        <th class="p-4 text-left text-xs font-semibold text-gray-800">
                            Perihal
                        </th>
                        <th class="p-4 text-left text-xs font-semibold text-gray-800">
                            tanggal surat
                        </th>
                        <th class="p-4 text-left text-xs font-semibold text-gray-800">
                           Masuk
                        </th>
                        <th class="p-4 text-left text-xs font-semibold text-gray-800">
                            Asal Surat
                        </th>
                        <th class="p-4 text-left text-xs font-semibold text-gray-800">
                            Lihat Surat
                        </th>
                        <th class="p-4 text-left text-xs font-semibold text-gray-800">
                            Aksi
                        </th>
                    </tr>
                </thead>

                <tbody class="whitespace-nowrap">
                    @foreach($surat as $no => $item)
                        <tr class="hover:bg-gray-50">
                            <td class="p-4 text-[15px] text-gray-800">
                                {{ $no + 1 }}
                            </td>
                            <td class="p-4 text-[15px] text-gray-800">
                                {{ $item->perihal }}
                            </td>
                            <td class="p-4 text-[15px] text-gray-800">
                                {{ \Carbon\Carbon::parse($item->tanggal_surat)->translatedFormat('l, d F Y') }}
                            </td>
                            <td class="p-4 text-[15px] text-gray-800">
                                {{ $item->jenis_surat }}
                            </td>
                            <td class="p-4 text-[15px] text-gray-800">
                                {{ $item->asal_surat }}
                            </td>
                            <td class="p-4 text-[15px] text-gray-800">
                                <a href="{{ Storage::url('public/' . $item->file_surat) }}" target="_blank" class="btn btn-primary">
                                    Lihat Surat
                                </a>
                            </td>
                            <td class="p-4">

                                <button class="mr-4" title="Edit" aria-haspopup="dialog" aria-expanded="false"
                                    aria-controls="hs-scale-animation-modal" data-hs-overlay="#hs-scale-animation-modal">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 fill-blue-500 hover:fill-blue-700"
                                        viewBox="0 0 348.882 348.882">
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
                </tbody>
            </table>
            @else
            <div class="text-center py-10">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada data</h3>
                <p class="mt-1 text-sm text-gray-500">Mulai dengan menambahkan data surat baru.</p>
            </div>
        @endif
        </div>

        @foreach ($surat as $key => $tes)

            <div id="popup-modal{{ $key }}" tabindex="-1"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <form action="{{ route('arsip.destroy', $tes->arsip_id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <div class="relative bg-white rounded-lg shadow-sm">
                            <button type="button"
                                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                                data-modal-hide="popup-modal{{ $key }}">
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

    </div>
@endsection
