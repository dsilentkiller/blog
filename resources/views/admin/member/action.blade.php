<div class="modal fade" id="deactiveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="addnewModalLabel">Add New Member </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['url'=>'save']) !!}
                <div class="mb-3">
                    {!! Form::label('firstname','Firstname') !!}
                    {{ !! Form::text('firstname','',['class'=>'form-control','placeholder'=>'Input Firstnname'])!! }}
                </div>

            </div>
            {{-- <form action="{{ route('blog.destroy') }}" method="POST">
                <div class="modal-body">

                    <p>Click confirm to delete !</p>

                </div> --}}
                <div class="modal-footer">
                    <input type="hidden" name="id" id="id" value="id">
                    <button class="btn btn-success" id="submit">Confirm</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    {{ Form::close()!! }}
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
  </button> --}}

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {!! Form::open(['url'=>'save']) !!}
            <div class="mb-3">
                {!! Form::label('firstname','Firstname') !!}
                {{ !! Form::text('firstname','',['class'=>'form-control','placeholder'=>'Input Firstnname'])!! }}
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
