@extends('test2.transaction.layout.master');

@section('title', 'Input Baru')
@section('content')

<div class="card mt-1">
    <div  class="card-header">
         <strong>Input Transaksi</strong> 
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('trans-update', $data->id )}}">
            @csrf
            @method('PATCH')
            <div class="form-group row">
              <div class="form-group col-6">
                  <span class="row mt-1">
                      <label class="col-2" for="description">Deskripsi</label>
                      <textarea class="form-control form-control-sm col-10" id="description" rows="5" name="description" > {{ $data->description }} </textarea>
                  </span>
              </div>
        
              <div class="form-group col-6 text-right">
                <div class="row mt-1">
                    <label class="col-3" for="code">Kode</label>
                    <input type="text" class="form-control form-control-sm col-5" id="code" name="code" value="{{$data->code}}">
                </div>
        
                <div class="row mt-1">
                    <label class="col-3" for="rate_euro">Rate Euro</label>
                    <input type="number" class="form-control form-control-sm col-3" id="rate_euro" name="rate_euro" value="{{$data->rate_euro}}">
                </div>
        
                <div class="row mt-1">
                    <label class="col-3" for="date_paid">Tgl Dibayar</label>
                    <input type="date" class="form-control form-control-sm col-4" id="date_paid" name="date_paid" value="{{$data->date_paid}}">
                </div>
        
              </div>
        
            </div>
            
            <div class="card">
                <div class="card-header text-right">
                        <button class="btnclose btn-danger btn-sm" id="btnclose_'+ card_idx + '">X</button>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="type" class="col-1 control-label text-right">Tipe</label>
                    
                        <div class="col-3">
                             <select class="form-control form-control-sm" name="category_type1" required="required">
                                <option selected value="Income">Income</option>
                                <option value="Expense">Expense</option>
                            </select>
                        </div>
                    </div> 
                
                    <table class="table table-sm table-bordered tbl-data1">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col" class="text-center">Transaksi</th>
                            <th scope="col" class="text-center">Nilai</th>
                            <th scope="col" class="text-center"> Aksi</th>
                          </tr>
                        </thead>
                        <tbody class="tbody1">
                          @php
                            $i=1;      
                            $last_item = count($data->detail);
                          @endphp
                          @foreach ($data->detail as $item)
                            @if ($item->category_type == "income" )
                                <tr>
                                    <td><input type="text" class="form-control form-control-sm" name="data1[{{$i}}][name]" id="name1_1" value="{{$item->trans_name}}"></td>
                                    <td><input type="number" class="form-control form-control-sm text-right" name="data1[{{$i}}][value]" id="value1_1"value="{{$item->total}}"></td>
                                    <td class="text-center"><button class="btn btn-primary btn-add-item" id="btn-add-item1_1">+</button></td>
                                </tr> 
                            @endif
                           @php
                             $i++;
                           @endphp   
                          @endforeach
                          
                        </tbody>
                    </table>

                    <button class="btn btn-primary float-right">Tambah</button>

                </div>
            </div>

            <div class="card mt-2 mb-2">
                <div class="card-header text-right">
                    <button class="btnclose btn-danger btn-sm" id="btnclose_'+ card_idx + '">X</button>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="type" class="col-md-1 control-label text-right">Tipe</label>
                    
                        <div class="col-md-3">
                             <select class="form-control form-control-sm" name="category_type2" required="required" >
                                <option value="Income">Income</option>
                                <option selected value="Expense">Expense</option>
                            </select>
                        </div>
                    </div> 
                
                    <table class="table table-sm table-bordered tbl-data2">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col" class="text-center">Transaksi</th>
                            <th scope="col" class="text-center">Sub Total</th>
                            <th scope="col"class="text-center"> Aksi</th>
                          </tr>
                        </thead>
                        <tbody class="tbody2">
                            {{-- <tr>
                                <td><input type="text" class="form-control form-control-sm" name="data2[1][name]" id="name2_2"></td>
                                <td><input type="number" class="form-control form-control-sm text-right" name="data2[1][value]" id="value2_2"></td>
                                <td class="text-center"><button class="btn btn-primary btn-add-item" id="btn-add-item_2">+</button></td>
                              </tr> --}}
                            @php
                              $i=1;      
                              $last_item = count($data->detail);
                            @endphp
                            @foreach ($data->detail as $item)
                              @if ($item->category_type == "expense" )
                                  <tr>
                                      <td><input type="text" class="form-control form-control-sm" name="data2[{{$i}}][name]" id="name2_2" value="{{$item->trans_name}}"></td>
                                      <td><input type="number" class="form-control form-control-sm text-right" name="data2[{{$i}}][value]" id="value2_2"value="{{$item->total}}"></td>
                                      <td class="text-center"><button class="btn btn-primary btn-add-item" id="btn-add-item2_2">+</button></td>
                                  </tr> 
                              @endif
                             @php
                               $i++;
                             @endphp   
                            @endforeach
                        </tbody>
                    </table>

                    <button class="btn btn-primary float-right">Tambah</button>

                </div>
            </div>
            
            <div class="text-right">
                <button type="submit" class="btn btn-primary">Edit Data</button>
                {{-- <button class="btn btn-danger ml-1 exit-button">Batal</button> --}}
            </div>

        </form>
    </div>
</div>
    
@endsection



@push('custom-scripts')
    <script type="text/javascript">
        window.$(document).ready(function(e){
            let dt = {!! json_encode($data) !!};
            console.log('data', dt);

            dt_income = dt.detail.filter(x => x.category_type === 'income');

            let i = dt_income.length;
            for (let index = 1; index < i; index++) {
                if(i != index){
                    window.$("#btn-add-item1_" + index) .hide();
                }
            }

            dt_expense = dt.detail.filter(x => x.category_type === 'expense');

            let j = dt_expense.length;
            for (let index = 1; index < j; index++) {
                if(j != index){
                    window.$("#btn-add-item2_" + index) .hide();
                }
            }


        });

        window.$(".tbl-data1").on('click', '.btn-add-item', function(e){
            e.preventDefault();
            let i = parseInt(this.id.split('_')[1]);

            // window.$('#name1_' + i).prop('disabled', true);
            // window.$('#value1_' + i).prop('disabled', true);
            i++;
            
            let sHtml ='<tr>' ;
            sHtml = sHtml +  '<td><input type="text" class="form-control form-control-sm" name="data1['+i+'][name]" id="name1_' +i+ '" ></td>';
            sHtml = sHtml +  '<td><input type="number" class="form-control form-control-sm text-right" name="data1['+i+'][value]" id="value1_'+ i+ '"></td>';
            sHtml = sHtml +  '<td class="text-center"><button class="btn btn-primary btn-add-item" id="btn-add-item1_' + i + '" >+</button></td>';
            sHtml = sHtml +  '</tr>';

            window.$('.tbody1').append(sHtml);
            window.$(this).hide();

        })

        window.$(".tbl-data2").on('click', '.btn-add-item', function(e){
            e.preventDefault();
            let i = parseInt(this.id.split('_')[1]);

            // window.$('#name2_' + i).prop('disabled', true);
            // window.$('#value2_' + i).prop('disabled', true);
            i++;
            
            let sHtml ='<tr>' ;
            sHtml = sHtml +  '<td><input type="text" class="form-control form-control-sm" name="data2['+i+'][name]" id="name2_' +i+ '" ></td>';
            sHtml = sHtml +  '<td><input type="number" class="form-control form-control-sm text-right" name="data2['+i+'][value]" id="value2_'+ i+ '"></td>';
            sHtml = sHtml +  '<td class="text-center"><button class="btn btn-primary btn-add-item" id="btn-add-item2_' + i + '" >+</button></td>';
            sHtml = sHtml +  '</tr>';

            window.$('.tbody2').append(sHtml);
            window.$(this).hide();

        })

    </script>
@endpush
