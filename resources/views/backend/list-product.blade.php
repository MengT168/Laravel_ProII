@extends('backend.master')

@section('content')
<div class="content-wrapper">
    @section('site-title')
      Admin | List Post
    @endsection
    @section('page-main-title')
      List Product
    @endsection

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
          <div class="table-responsive text-nowrap">
            <table class="table">
              <thead>
                <tr>
                    <th>Name</th>
                    <th>Thumbnail</th>
                    <th>Stock</th>
                    <th>Regular Price</th>
                    <th>Sale Price</th>
                    <th>Size</th>
                    <th>Color</th>
                    <th>Category</th>
                    <th>Viewer</th>
                    <th>Author</th>
                    <th>Create Date</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                @foreach ($products as $proVal)
                    <tr>
                        <td><span class="badge bg-label-primary me-1">{{ $proVal->name }}</span></td>
                        <td>
                            <img src="/uploads/{{ $proVal->thumbnail }}" width="70px">
                        </td>
                        <td>{{ $proVal->quantity }}</td>
                        <td>{{ $proVal->regular_price}} $</td>
                        <td>{{ $proVal->sale_price }} $</td>
                        <td><span class="badge bg-label-warning me-1">{{ $proVal->attribute_size }}</span></td>
                        <td><span class="badge bg-label-danger me-1">{{ $proVal->attribute_color }}</span></td>
                        <td><span class="badge bg-label-warning me-1">{{ $proVal->cate_name }}</span></td>
                        <td><i>{{ $proVal->viewer }}</i></td>
                        <td><span class="badge bg-label-primary me-1">{{ $proVal->author_name }}</span></td>
                        <td><i>{{ $proVal->created_at }}</i></td>
                        <td>
                            <div class="dropdown">
                              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#basicModal" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                              </div>
                            </div>
                          </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

        <div class="mt-3">
          <form action="" method="post">
          <div class="modal fade" id="basicModal" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel1">Are you sure to remove this post?</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                  <input type="hidden" id="remove-val" name="remove-id">
                  <button type="submit" class="btn btn-danger">Confirm</button>
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
              </div>
            </div>
          </form>
        </div>

      <hr class="my-5" />
    </div>
    <!-- / Content -->
  </div>
</div>

@endsection
