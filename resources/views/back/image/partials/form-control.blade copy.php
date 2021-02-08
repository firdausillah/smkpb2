                                    <div class="form-group">
                                        <label for="">Pilih Galery</label>
                                        <select name="galery" id="galery" class="form-control">
                                            @foreach ($galeries as $galery)
                                            <option {{ $images->galery()->find($galery->id) ? 'selected' : '' }} value="{{ $galery->id }}">{{ $galery->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
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
                                        <a href="{{ route('image') }}" class="btn btn-secondary">Kembali</a>
                                    </div>