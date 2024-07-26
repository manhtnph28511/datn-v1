@extends('admin.layouts.app')
@section('app')
    <div class="dash-content">
        <div class="activity">
            <div class="py-20">
                <div class="flex justify-end my-2">
                    <a
                        class="bg-[#4fd1c5] text-white font-bold py-2 px-4 rounded-full"
                        href="{{ route('admin.category.index')  }}">
                        Back
                        <i class="fa-solid fa-arrow-rotate-left"></i>
                    </a>
                </div>
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead
                            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 w-[200px]">
                                Slug
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Category
                            </th>
                            <th scope="col" class="px-6 py-3 w-[300px]">
                                Action
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($subCates as $sCate)
                            @if($sCate->parent_id === 1)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td scope="row" class="px-6 py-4">
                                        {{ $sCate->name  }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $sCate->slug  }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $sCate->getCateName()->name  }}
                                    </td>
                                    <td class="px-6 py-4 flex gap-x-4">
                                        <a href="{{ route('admin.cate.subcate.restore',$sCate->id)  }}"
                                           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                                            Restore
                                            <i class="fa-solid fa-rotate-right"></i>
                                        </a>
                                        <form action="{{ route('admin.cate.subcate.destroy',$sCate->id)  }}"
                                              method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Bạn có muốn xóa không??')"
                                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">
                                                Remove
                                                <i class="fa-solid fa-xmark"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
