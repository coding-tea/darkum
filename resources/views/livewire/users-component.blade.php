<div>
  <!-- Content Row -->
  @section("style")
  <link rel="stylesheet" href="/path/to/print-styles.css" media="print">

    <style>
      .form-select{
        width: 150px;
        color: rgb(7, 7, 7);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        border: none;
        border:  1px solid rgb(143, 143, 143);
      }
    </style>
  @endsection
  <div class="card">
    
    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary">
        Users
        </h6>
        
        <div class="ml-auto">
            <a href="{{ route('users.create') }}" class="btn btn-primary">
                <span class="icon text-white-50">
                    <i class="fa fa-plus"></i>
                </span>
                <span class="text">New user</span>
            </a>
        </div>
    </div>



    <div class="form-row mt-3 ml-3">
      <div class="form-group col-md-3">
        <label for="inputCity">Name :</label>
        <input wire:model="search" type="text" value="hello" placeholder="Search By Name" class="form-control" id="inputCity">
      </div>
      <div class="form-group col-md-3">
        <label for="inputState">Show</label>
        <select id="inputState" class="form-control" wire:model="paginate">  
          <option selected value="">Choose...</option>
          <option value="5">5</option>
          <option value="10">10</option>
          <option value="15">15</option>
          <option value="20">20</option>
          <option value="25">25</option>
          <option value="30">30</option>
        </select>
      </div>
      <div class="form-group col-md-3">
        <label for="inputZip">Email</label>
        <input type="text" class="form-control" placeholder="Search By Email" wire:model="email">
      </div>
      <div class="form-group col-md-3">
        <label for="inputZip" class="ml-1">Print</label>  
        <label for="inputZip" class="ml-5">PDF</label>  <br>
        <button id="printButton" class="btn btn-primary">Print</button>
        <button id="downloadButton" class="btn btn-danger ml-4"> PDF</button>
      </div>
    </div>


    <div class="card-body">
      @if(session()->has("message"))
        <div class="{{session('alert')}} w-50 p-3 mx-auto my-auto">{!! session("message") !!}</div>
      @endif <br>
        <div class="table-responsive">
          
            <table id="pdfContent" class="table table-bordered table-striped table-hover datatable datatable-User" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($users)
                    @forelse($users as $user)
                    <tr data-entry-id="{{ $user->id }}">
                        <td></td>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                          <span class="badge badge-info">{{ $user->role }}<span/>
                        </td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                            <form onclick="return confirm('are you sure to remove user_id : {{$user->id}} : user_name : {{$user->name}}  ?')"  class="d-inline" action="{{ route('users.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Data Empty</td>
                    </tr>
                    @endforelse
                  </tbody>
                  
                </table>
                <div class="noprint" style="margin-left: 45% ">               
                  @if(!empty($search) || !empty($email) || !empty($paginate))
                    <a wire:click="load" class="btn btn-lg rounded btn-primary">Load More ...</a>
                  @else 
                    {{ $users->links() }}
                   @endif
                </div>
                @endisset
        </div>
    </div>
</div>
<!-- Content Row -->
@section("script")
<script>
  // PRINT BUTTON
  document.getElementById("printButton").addEventListener("click", function() {
      window.print();
  });

// PDF BUTTON :
document.getElementById("downloadButton").addEventListener("click", function() {
    var element = document.getElementById("pdfContent");
    var opt = {
        filename: 'users.pdf',
        margin: [10, 10, 10, 10],
        image: { type: 'jpeg', quality: 1 },
        html2canvas: { scale: 2 },
        jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
    };

    // Generate the PDF from the element's HTML
    html2pdf().set(opt).from(element).save();
});



  </script>

  // for download PDF
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>


@endsection
</div>
