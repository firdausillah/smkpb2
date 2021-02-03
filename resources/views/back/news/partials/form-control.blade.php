                                    <input type="hidden" name="writer" value="{{ old('writer') ?? Auth::user()->name }}">
                                    <div class="form-group">
                                        <label for="">Judul</label>
                                        <input type="text" name="title" value="{{ old('title ') ?? $news->title }}" id="title" class="form-control">
                                        @error('title')
                                        <div class="mt-2 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tumbnail</label> <br>
                                        <img src="{{ asset('storage/'.$news->image) }}" height="100px" alt="{{ $news->title }}">
                                        <input type="file" name="image" id="image">
                                        @error('image')
                                        <div class="mt-2 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Deskripsi</label>
                                        <textarea name="description" id="ckeditor" class="ckeditor form-control">{{ old('description') ?? $news->description }}</textarea>
                                        @error('description')
                                        <div class="mt-2 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Kelas</label>
                                        <select name="grade" id="grade" class="form-control">
                                            <option value="">Umum</option>
                                            @foreach ($grades as $grade)
                                                <option {{ $news->grades()->find($grade->id) ? 'selected' : '' }} value="{{ $grade->id }}">{{ $grade->title }}</option>
                                            @endforeach
                                        </select>
                                        @error('grade')
                                        <div class="mt-2 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tags</label>
                                        <input type="text" name="tags" id="tags" class="form-control" placeholder="Pisahkan dengan koma" value="{{ old('tags ') ?? $news->tags }}">
                                        @error('tags')
                                        <div class="mt-2 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-primary" name="button">{{ $submit }}</button>
                                        <a href="{{ route('news') }}" class="btn btn-secondary">Kembali</a>
                                    </div>