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
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-primary" name="button">{{ $submit }}</button>
                                        <a href="{{ route('galery') }}" class="btn btn-secondary">Kembali</a>
                                    </div>