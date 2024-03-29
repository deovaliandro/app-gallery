@extends('inc.headeradmin')
@section('content')
<section class="section">
    <div class="container">
        <form method="post" action="/admin/gallery/update/{{ $gallery->id }}" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
            {{-- Nama --}}
            <div class="field">
                <label class="label">Name</label>
                <div class="control">
                    <input class="input" name="name" type="text" placeholder="Nama objek"
                        value="{{ $gallery->name }}">
                </div>

                @if($errors->has('name'))
                    <div class="text-danger">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>

            <div class="field">
                <label class="label">Category</label>
                <div class="control">
                    <div class="select">
                        <select name="category" value="{{ $gallery->category }}">
                            <option>Category 1</option>
                            <option>Category 2</option>
                            <option>Category 3</option>
                            <option>Category 4</option>
                            <option>Category 5</option>
                        </select>
                    </div>
                </div>
                @if($errors->has('category'))
                    <div class="text-danger">
                        {{ $errors->first('category') }}
                    </div>
                @endif
            </div>

            <div class="field">
                <label class="label">Address</label>
                <div class="control">
                    <input class="input" name="address" type="text" placeholder="Alamat objek"
                        value="{{ $gallery->address }}">
                </div>
                @if($errors->has('address'))
                    <div class="text-danger">
                        {{ $errors->first('address') }}
                    </div>
                @endif
            </div>

            <div class="field">
                <label class="label">Long</label>
                <div class="control">
                    <input class="input" name="long" type="text" placeholder="Alamat objek"
                        value="{{ $gallery->long }}">
                </div>

                @if($errors->has('long'))
                    <div class="text-danger">
                        {{ $errors->first('long') }}
                    </div>
                @endif
            </div>

            <div class="field">
                <label class="label">Lat</label>
                <div class="control">
                    <input class="input" name="lat" type="text" placeholder="Alamat objek"
                        value="{{ $gallery->lat }}">
                </div>

                @if($errors->has('lat'))
                    <div class="text-danger">
                        {{ $errors->first('lat') }}
                    </div>
                @endif
            </div>

            <div class="field">
                <label class="label">Information</label>
                <div class="control">
                    <textarea class="textarea" name="information"
                        placeholder="Textarea">{{ $gallery->information }}</textarea>
                </div>

                @if($errors->has('information'))
                    <div class="text-danger">
                        {{ $errors->first('information') }}
                    </div>
                @endif
            </div>

            <div class="field">
                <div class="file has-name is-fullwidth">
                    <label class="file-label">
                        <input class="file-input" name="photo" type="file" name="resume" value={{ $gallery->photo }}>
                        <span class="file-cta">
                            <span class="file-icon">
                                <i class="fas fa-upload"></i>
                            </span>
                            <span class="file-label">
                                Choose a file…
                            </span>
                        </span>
                    </label>
                    @if($errors->has('photo'))
                        <div class="text-danger">
                            {{ $errors->first('photo') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-success is-link">
                        <span class="icon is-small">
                            <i class="fas fa-check"></i>
                        </span>
                        <span>Save</span>
                    </button>

                </div>
                <div class="control">
                    <button class="button is-link is-danger is-outlined">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
