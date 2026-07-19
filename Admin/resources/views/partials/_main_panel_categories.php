<div class="main-panel">
  <div class="content-wrapper category-page">
    <style>
      .category-page { max-width: 1380px; margin: 0 auto; }
      .category-page__title { margin: 0 0 1.5rem; color: #0f172a; font-weight: 700; }
      .category-layout { display: grid; grid-template-columns: minmax(0, 1fr) minmax(0, 1fr); gap: 1.5rem; }
      .category-card { margin-bottom: 1.5rem; border: 1px solid #e2e8f0; border-radius: 18px; background: #fff; box-shadow: 0 10px 28px rgba(15, 23, 42, .06); }
      .category-card__head { padding: 1.15rem 1.25rem; border-bottom: 1px solid #edf1f6; }
      .category-card__head h5 { margin: 0; color: #0f172a; font-weight: 700; }
      .category-card__body { padding: 1.25rem; }
      .category-page .form-group label { color: #334155; font-size: .86rem; font-weight: 600; }
      .category-page .form-control, .category-page .custom-select { min-height: 44px; border: 1px solid #dbe3ef; border-radius: 10px; }
      .category-list { margin: 0; padding: 0; list-style: none; }
      .category-list__item { display: flex; align-items: center; justify-content: space-between; gap: 1rem; padding: .9rem 0; border-bottom: 1px solid #eef2f7; }
      .category-list__item:last-child { border-bottom: 0; }
      .category-list__name { color: #1e293b; font-weight: 600; }
      .category-list__sub { display: block; margin-top: .2rem; color: #64748b; font-size: .82rem; }
      .category-count { min-width: 32px; padding: .2rem .5rem; border-radius: 999px; background: #eff6ff; color: #2563eb; font-size: .78rem; font-weight: 700; text-align: center; }
      @media (max-width: 991px) { .category-layout { grid-template-columns: 1fr; } }
    </style>

    <h3 class="category-page__title">Kateqoriyalar</h3>
    <div class="category-layout">
      <div>
        <section class="category-card">
          <div class="category-card__head"><h5>Kateqoriya yarat</h5></div>
          <div class="category-card__body">
            <form action="#" method="post">
              <div class="form-group"><label for="category-name">Kateqoriya adı</label><input id="category-name" name="category_name" class="form-control" type="text" required></div>
              <div class="form-group"><label for="category-slug">Slug</label><input id="category-slug" name="category_slug" class="form-control" type="text" placeholder="elektronika"></div>
              <div class="form-group"><label for="category-image">Şəkil</label><input id="category-image" name="category_image" class="form-control" type="file" accept="image/*"></div>
              <button class="btn btn-primary px-4" type="submit"><i class="mdi mdi-plus mr-1"></i>Kateqoriya əlavə et</button>
            </form>
          </div>
        </section>

        <section class="category-card">
          <div class="category-card__head"><h5>Subkateqoriya yarat</h5></div>
          <div class="category-card__body">
            <form action="#" method="post">
              <div class="form-group"><label for="parent-category">Əsas kateqoriya</label><select id="parent-category" name="parent_category" class="custom-select" required><option value="">Kateqoriya seçin</option><option value="electronics">Elektronika</option><option value="women">Qadın geyimləri</option><option value="men">Kişi geyimləri</option><option value="home">Ev və dekor</option></select></div>
              <div class="form-group"><label for="subcategory-name">Subkateqoriya adı</label><input id="subcategory-name" name="subcategory_name" class="form-control" type="text" required></div>
              <div class="form-group"><label for="subcategory-slug">Slug</label><input id="subcategory-slug" name="subcategory_slug" class="form-control" type="text" placeholder="kameralar"></div>
              <button class="btn btn-primary px-4" type="submit"><i class="mdi mdi-plus mr-1"></i>Subkateqoriya əlavə et</button>
            </form>
          </div>
        </section>
      </div>

      <section class="category-card">
        <div class="category-card__head"><h5>Mövcud kateqoriyalar</h5></div>
        <div class="category-card__body">
          <ul class="category-list">
            <li class="category-list__item"><div><span class="category-list__name">Elektronika</span><span class="category-list__sub">Kameralar, Telefonlar, Aksesuarlar</span></div><span class="category-count">3</span></li>
            <li class="category-list__item"><div><span class="category-list__name">Qadın geyimləri</span><span class="category-list__sub">Paltarlar, Ayaqqabılar, Çantalar</span></div><span class="category-count">3</span></li>
            <li class="category-list__item"><div><span class="category-list__name">Kişi geyimləri</span><span class="category-list__sub">Köynəklər, Şalvarlar, Ayaqqabılar</span></div><span class="category-count">3</span></li>
            <li class="category-list__item"><div><span class="category-list__name">Ev və dekor</span><span class="category-list__sub">Mebel, İşıqlandırma, Mətbəx</span></div><span class="category-count">3</span></li>
          </ul>
        </div>
      </section>
    </div>
  </div>
</div>
