                                    <div class="form-group">
                                        <label for="">Judul</label>
                                        <input type="text" name="title" value="{{ old('title ') ?? $galery->title }}" id="title" class="form-control" onkeyup="buatslug()">
                                        @error('title')
                                        <div class="mt-2 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Slug</label>
                                        <input type="text" name="slug" value="{{ old('slug ') ?? $galery->slug }}" id="slug" class="form-control" disabled>
                                        @error('slug')
                                        <div class="mt-2 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Deskripsi</label>
                                        <textarea name="description" id="ckeditor" class="ckeditor form-control">{{ old('description') ?? $galery->description }}</textarea>
                                        @error('description')
                                        <div class="mt-2 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Grade</label>
                                        <select name="grade" id="grade" class="form-control">
                                            <option value="">Umum</option>
                                            @foreach ($grades as $grade)
                                                <option {{ $galery->grades()->find($grade->id) ? 'selected' : '' }} value="{{ $grade->id }}">{{ $grade->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- <div class="form-froup">
                                        <label for="">Gambar</label>
                                        <input type="file" name="image[]" id="gallery-photo-add" accept="image/gif,image/jpeg,image/jpg,image/png," multiple>
                                        <div class="card">
                                            <div class="card-header">Tambahkan Gambar</div>
                                            <div class="card-body">
                                                <div class="gallery">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header">Gambar yang sudah ada</div>
                                            <div class="card-body">
                                                <div class="edit-gallery">
                                                    @foreach ($images as $image)
                                                    <img src="{{ asset('storage/'.$image->image) }}" height="100px" alt="" class="img-thumbnails">
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        @error('galery')
                                        <div class="mt-2 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div> --}}
                                    <div class="form-group">
                                        <label for="">Gambar</label>
                                        <div class="dropzone">
                                            <div class="dz-message text-center">
                                                <h4>Klik atau Drop gambar kesini</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-primary" name="button">{{ $submit }}</button>
                                        <a href="{{ route('galery') }}" class="btn btn-secondary">Kembali</a>
                                    </div>