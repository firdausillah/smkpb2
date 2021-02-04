                                    <div class="form-group">
                                        <label for="">Nama</label>
                                        <input type="text" name="name" value="{{ old('name ') ?? $teach->name }}" id="name" class="form-control">
                                        @error('name')
                                        <div class="mt-2 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nomor Induk</label>
                                        <input type="number" name="NIPY" value="{{ old('NIPY ') ?? $teach->NIPY }}" id="NIPY" class="form-control">
                                        @error('NIPY')
                                        <div class="mt-2 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Jabatan</label>
                                        <input type="text" name="position" value="{{ old('position ') ?? $teach->position }}" id="position" class="form-control">
                                        @error('position')
                                        <div class="mt-2 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Gambar</label> <br>
                                        <img src="{{ asset('storage/'.$teach->image) }}" height="100px" alt="{{ $teach->name }}">
                                        <input type="file" name="image" id="image">
                                        @error('image')
                                        <div class="mt-2 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-primary" name="button">{{ $submit }}</button>
                                        <a href="{{ route('teach') }}" class="btn btn-secondary">Kembali</a>
                                    </div>