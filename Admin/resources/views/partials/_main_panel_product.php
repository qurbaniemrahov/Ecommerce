<div class="main-panel">
  <div class="content-wrapper simple-product-page">
    <style>
      .simple-product-page { max-width: 1180px; margin: 0 auto; }
      .simple-product-page__title { margin: 0 0 1.5rem; color: #0f172a; font-weight: 700; }
      .simple-product-form { display: grid; grid-template-columns: minmax(0, 1fr) 350px; gap: 1.5rem; }
      .simple-product-card { margin-bottom: 1.5rem; border: 1px solid #e2e8f0; border-radius: 16px; background: #fff; box-shadow: 0 10px 26px rgba(15, 23, 42, .06); }
      .simple-product-card__head { padding: 1rem 1.25rem; border-bottom: 1px solid #edf1f6; }
      .simple-product-card__head h5 { margin: 0; color: #0f172a; font-weight: 700; }
      .simple-product-card__body { padding: 1.25rem; }
      .simple-product-page label { color: #334155; font-size: .86rem; font-weight: 600; }
      .simple-product-page .form-control, .simple-product-page .custom-select { min-height: 44px; border: 1px solid #dbe3ef; border-radius: 9px; }
      .simple-product-page textarea.form-control { min-height: 118px; resize: vertical; }
      .product-type { display: flex; align-items: center; gap: .75rem; padding: .9rem 0; border-bottom: 1px solid #eef2f7; cursor: pointer; }
      .product-type:last-child { border-bottom: 0; }
      .product-type input { width: 18px; height: 18px; }
      .product-type__icon { width: 36px; height: 36px; display: flex; align-items: center; justify-content: center; border-radius: 9px; background: #eff6ff; color: #2563eb; font-size: 1.2rem; }
      .product-type strong { display: block; color: #1e293b; font-size: .92rem; }
      .product-type span { display: block; color: #64748b; font-size: .8rem; }
      .image-input { min-height: 150px; display: flex; flex-direction: column; align-items: center; justify-content: center; border: 2px dashed #bfdbfe; border-radius: 12px; background: #f8fbff; color: #64748b; text-align: center; cursor: pointer; }
      .image-input i { margin-bottom: .45rem; color: #2563eb; font-size: 2rem; }
      @media (max-width: 991px) { .simple-product-form { grid-template-columns: 1fr; } }
    </style>

    <h3 class="simple-product-page__title">Məhsul əlavə et</h3>
    <form action="#" method="post" enctype="multipart/form-data" class="simple-product-form">
      <div>
        <section class="simple-product-card">
          <div class="simple-product-card__head"><h5>Məhsul məlumatları</h5></div>
          <div class="simple-product-card__body">
            <div class="form-group"><label for="product-name">Məhsul adı</label><input id="product-name" name="name" class="form-control" type="text" required></div>
            <div class="row">
              <div class="col-md-6 form-group"><label for="product-category">Kateqoriya</label><select id="product-category" name="category" class="custom-select" required><option value="">Kateqoriya seçin</option><option value="electronics">Elektronika</option><option value="women">Qadın geyimləri</option><option value="men">Kişi geyimləri</option><option value="home">Ev və dekor</option></select></div>
              <div class="col-md-6 form-group"><label for="product-subcategory">Subkateqoriya</label><select id="product-subcategory" name="subcategory" class="custom-select" disabled required><option value="">Əvvəl kateqoriya seçin</option></select></div>
            </div>
            <div class="row">
              <div class="col-md-6 form-group"><label for="product-price">Qiymət</label><input id="product-price" name="price" class="form-control" type="number" min="0" step="0.01" required></div>
              <div class="col-md-6 form-group"><label for="product-stock">Stok sayı</label><input id="product-stock" name="stock" class="form-control" type="number" min="0" required></div>
            </div>
            <div class="form-group mb-0"><label for="product-description">Təsvir</label><textarea id="product-description" name="description" class="form-control"></textarea></div>
          </div>
        </section>

        <section class="simple-product-card">
          <div class="simple-product-card__head"><h5>Şəkil</h5></div>
          <div class="simple-product-card__body">
            <label class="image-input" for="product-image"><i class="mdi mdi-image-plus"></i><span>Məhsul şəklini seçin</span></label>
            <input id="product-image" name="image" type="file" accept="image/*" class="d-none" required>
          </div>
        </section>
      </div>

      <aside>
        <section class="simple-product-card">
          <div class="simple-product-card__head"><h5>Məhsul bölməsi</h5></div>
          <div class="simple-product-card__body">
            <label class="product-type"><input name="is_new" type="checkbox"><span class="product-type__icon"><i class="mdi mdi-new-box"></i></span><span><strong>Yeni məhsullar</strong><span>Yeni gələn məhsullar bölməsində göstər</span></span></label>
            <label class="product-type"><input name="is_popular" type="checkbox"><span class="product-type__icon"><i class="mdi mdi-star-outline"></i></span><span><strong>Populyar məhsullar</strong><span>Populyar məhsullar bölməsində göstər</span></span></label>
            <label class="product-type"><input id="is-discounted" name="is_discounted" type="checkbox"><span class="product-type__icon"><i class="mdi mdi-sale"></i></span><span><strong>Endirimli məhsullar</strong><span>Endirimli məhsullar bölməsində göstər</span></span></label>
          </div>
        </section>

        <section id="discount-card" class="simple-product-card d-none">
          <div class="simple-product-card__head"><h5>Endirim</h5></div>
          <div class="simple-product-card__body"><div class="form-group mb-0"><label for="old-price">Əvvəlki qiymət</label><input id="old-price" name="old_price" class="form-control" type="number" min="0" step="0.01"></div></div>
        </section>

        <button type="submit" class="btn btn-primary btn-block py-3"><i class="mdi mdi-content-save-outline mr-1"></i>Məhsulu yadda saxla</button>
      </aside>
    </form>
  </div>

  <script>
    const categorySubcategories = {
      electronics: ['Kameralar', 'Telefonlar', 'Aksesuarlar'],
      women: ['Paltarlar', 'Ayaqqabılar', 'Çantalar'],
      men: ['Köynəklər', 'Şalvarlar', 'Ayaqqabılar'],
      home: ['Mebel', 'İşıqlandırma', 'Mətbəx']
    };
    const categorySelect = document.getElementById('product-category');
    const subcategorySelect = document.getElementById('product-subcategory');
    categorySelect.addEventListener('change', function () {
      const subcategories = categorySubcategories[this.value] || [];
      subcategorySelect.innerHTML = '<option value="">Subkateqoriya seçin</option>';
      subcategorySelect.disabled = subcategories.length === 0;
      subcategories.forEach(function (subcategory) {
        const option = document.createElement('option');
        option.value = subcategory;
        option.textContent = subcategory;
        subcategorySelect.appendChild(option);
      });
    });
    document.getElementById('is-discounted').addEventListener('change', function () {
      document.getElementById('discount-card').classList.toggle('d-none', !this.checked);
    });
  </script>
</div>
