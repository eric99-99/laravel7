@extends('test2.transaction.layout.master');

@section('title', 'Input Baru')
@section('content')

<div class="card mt-1">
    <div  class="card-header">
         <strong>Input Transaksi</strong> 
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('trans-store') }}">
            @csrf
            <div class="form-group row">
              <div class="form-group col-6">
                  <span class="row mt-1">
                      <label class="col-2" for="description">Deskripsi</label>
                      <textarea class="form-control form-control-sm col-10" id="description" rows="5" name="description"></textarea>
                  </span>
              </div>
        
              <div class="form-group col-6 text-right">
                <div class="row mt-1">
                    <label class="col-3" for="code">Kode</label>
                    <input type="text" class="form-control form-control-sm col-5" id="code" name="code">
                </div>
        
                <div class="row mt-1">
                    <label class="col-3" for="rate_euro">Rate Euro</label>
                    <input type="number" class="form-control form-control-sm col-3" id="rate_euro" name="rate_euro">
                </div>
        
                <div class="row mt-1">
                    <label class="col-3" for="date_paid">Tgl Dibayar</label>
                    <input type="date" class="form-control form-control-sm col-4" id="date_paid" name="date_paid">
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
                                <option value="Income">Income</option>
                                <option value="Expense">Expense</option>
                            </select>
                        </div>
                    </div> 
                
                    <table class="table table-sm table-bordered tbl-data1">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col" class="text-center">Transaksi</th>
                            <th scope="col" class="text-center">Nilai</th>
                            <th scope="col"class="text-center"> Aksi</th>
                          </tr>
                        </thead>
                        <tbody class="tbody1">
                          <tr>
                            <td><input type="text" class="form-control form-control-sm" name="data1[1][name]" id="name1_1"></td>
                            <td><input type="number" class="form-control form-control-sm text-right" name="data1[1][value]" id="value1_1"></td>
                            <td class="text-center"><button class="btn btn-primary btn-add-item" id="btn-add-item_1">+</button></td>
                          </tr>
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
                            <tr>
                                <td><input type="text" class="form-control form-control-sm" name="data2[1][name]" id="name2_2"></td>
                                <td><input type="number" class="form-control form-control-sm text-right" name="data2[1][value]" id="value2_2"></td>
                                <td class="text-center"><button class="btn btn-primary btn-add-item" id="btn-add-item_2">+</button></td>
                              </tr>
                        </tbody>
                    </table>

                    <button class="btn btn-primary float-right">Tambah</button>

                </div>
            </div>
            
            <div class="text-right">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
    
@endsection



@push('custom-scripts')
    <script type="text/javascript">
        window.$(".tbl-data1").on('click', '.btn-add-item', function(e){
            e.preventDefault();
            let i = parseInt(this.id.split('_')[1]);

            // window.$('#name1_' + i).prop('disabled', true);
            // window.$('#value1_' + i).prop('disabled', true);
            i++;
            
            let sHtml ='<tr>' ;
            sHtml = sHtml +  '<td><input type="text" class="form-control form-control-sm" name="data1['+i+'][name]" id="name1_' +i+ '" ></td>';
            sHtml = sHtml +  '<td><input type="number" class="form-control form-control-sm text-right" name="data1['+i+'][value]" id="value1_'+ i+ '"></td>';
            sHtml = sHtml +  '<td class="text-center"><button class="btn btn-primary btn-add-item" id="btn-add-item_' + i + '" >+</button></td>';
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
            sHtml = sHtml +  '<td class="text-center"><button class="btn btn-primary btn-add-item" id="btn-add-item_' + i + '" >+</button></td>';
            sHtml = sHtml +  '</tr>';

            window.$('.tbody2').append(sHtml);
            window.$(this).hide();

        })

    </script>
@endpush
