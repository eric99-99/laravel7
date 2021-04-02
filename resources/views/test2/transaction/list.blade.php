@extends('test2.transaction.layout.master');

@section('title', 'Daftar Transaksi')
@section('content')

<div class="card mt-1">
    <div  class="card-header">
         <strong>Daftar Transaksi</strong> 
    </div>
    <div class="card-body">
        <form action="">
            {{-- <div class="row mb-1"> --}}
                {{-- <div class="d-flex justify-content-start col">
                    <button class="btn-sm btn-primary"> Tambah Data</button>
                </div> --}}
    
                <div class="d-flex justify-content-center">
                    <input type="date" class="form-control form-control-sm col-2" id="date_paid" name="date_paid1">
                    <label class="ml-1"> sd </label>
                    <input type="date" class="form-control form-control-sm col-2 ml-1" id="date_paid" name="date_paid2">
                    
                    <div class="col-2">
                            <select class="form-control form-control-sm" name="category_type" required="required">
                            <option value="Income">Income</option>
                            <option value="Expense">Expense</option>
                        </select>
                    </div>
                    <input type="text" class="form-control form-control-sm col-3 ml-1" id="search" name="search" placeholder="Search ..">
                    <button class="btn-sm btn-success ml-1"> Search</button>
    
                </div>
            {{-- </div>     --}}
        </form>


        <table class="table table-sm table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center">Deslripsi</th>
                    <th scope="col"class="text-center"> Kode</th>
                    <th scope="col"class="text-center"> Rate Euro</th>
                    <th scope="col"class="text-center"> Date Paid</th>
                    <th scope="col"class="text-center"> Kategori </th>
                    <th scope="col"class="text-center"> Nama Transaksi </th>
                    <th scope="col"class="text-center"> Total</th>

                </tr>
            </thead>
            <tbody>
                @php
                    $i=1;
                @endphp
                @foreach($data as $item)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$item->description}}</td>
                        <td>{{$item->code}}</td>
                        <td>{{$item->rate_euro}}</td>
                        <td>{{$item->date_paid}}</td>
                        <td>{{$item->category_type}}</td>
                        <td>{{$item->trans_name}}</td>
                        <td>{{$item->total}}</td>

                        
                    </tr>
                @php
                    $i++;
                @endphp
                @endforeach
            </tbody>
            {{-- {{ $data->links() }} --}}
        </table>

        <div class="d-flex justify-content-center">
            {{ $data->links() }}
        </div>

    </div>

</div>
    
@endsection



@push('custom-scripts')
    <script type="text/javascript">
        

    </script>
@endpush
