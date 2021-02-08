                                    <div class="form-group">
                                        <label for="">Judul</label>
                                        <input type="text" name="title" value="{{ old('title ') ?? $extracurriculars->title }}" id="title" class="form-control">
                                        @error('title')
                                        <div class="mt-2 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Gambar</label> <br>
                                        <img src="{{ asset('storage/'.$extracurriculars->image) }}" height="100px" alt="{{ $extracurriculars->title }}">
                                        <input type="file" name="image" id="image">
                                        @error('image')
                                        <div class="mt-2 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Icon</label>
                                        <input type="text" name="icon" value="{{ old('icon ') ?? $extracurriculars->icon }}" id="icon" placeholder="copy dari https://fontawesome.com/icons?d=gallery. contoh : fas fa-user" class="form-control">
                                        @error('icon')
                                        <div class="mt-2 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Deskripsi</label>
                                        <textarea name="description" id="ckeditor" class="ckeditor form-control">{{ old('description') ?? $extracurriculars->description }}</textarea>
                                        @error('description')
                                        <div class="mt-2 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Materi</label>
                                        <textarea name="type" id="ckeditor" class="ckeditor form-control">{{ old('type') ?? $extracurriculars->type }}</textarea>
                                        @error('type')
                                        <div class="mt-2 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-primary" name="button">{{ $submit }}</button>
                                        <a href="{{ route('grade') }}" class="btn btn-secondary">Kembali</a>
                                    </div>