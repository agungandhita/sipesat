@extends('frontend.layouts.main')

@section('container')
    <!-- Card Blog -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <section class="bg-secondary/30">
            <div class="magazine-container">
              <div class="mb-12 flex items-end justify-between">
                <div>
                  <h2 class="mb-2 font-serif text-3xl font-medium">Pengumuman dan Berita</h2>
                  <p class="text-muted-foreground max-w-xl">Seluruh pengumuman dan berita tentang desa dapat di lihat disini</p>
                </div>
                {{-- <a href="#" class="group hidden items-center text-sm font-medium tracking-wider uppercase md:inline-flex">
                  View All
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-2 transition-transform group-hover:translate-x-1">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                  </svg>
                </a> --}}
              </div>

              <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3 lg:gap-8">
                <!-- Article Card 1 -->
                <article class="article-card overflow-hidden rounded-lg">
                  <a href="#" class="block">
                    <div class="overflow-hidden">
                      <img src="https://images.unsplash.com/photo-1493809842364-78817add7ffb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80" alt="Slow Living" class="h-64 w-full object-cover" />
                    </div>
                    <div class="p-6">
                      <div class="mb-3">
                        <span class="text-primary text-xs font-medium tracking-wider uppercase"> Lifestyle </span>
                      </div>
                      <h3 class="mb-3 font-serif text-xl font-medium">The Art of Slow Living in Modern Cities</h3>
                      <p class="text-muted-foreground mb-4 text-sm">Exploring how urban dwellers are embracing mindfulness and intentional living amidst the chaos.</p>
                      <div class="text-muted-foreground flex items-center justify-between text-xs">
                        <span>Emma Chen</span>
                        <span>May 23, 2023</span>
                      </div>
                    </div>
                  </a>
                </article>

                <!-- Article Card 2 -->
                <article class="article-card overflow-hidden rounded-lg">
                  <a href="#" class="block">
                    <div class="overflow-hidden">
                      <img src="https://images.unsplash.com/photo-1495195134817-aeb325a55b65?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=876&q=80" alt="Culinary Traditions" class="h-64 w-full object-cover" />
                    </div>
                    <div class="p-6">
                      <div class="mb-3">
                        <span class="text-primary text-xs font-medium tracking-wider uppercase"> Food </span>
                      </div>
                      <h3 class="mb-3 font-serif text-xl font-medium">Culinary Traditions Reimagined</h3>
                      <p class="text-muted-foreground mb-4 text-sm">How chefs are preserving cultural heritage while innovating with modern techniques.</p>
                      <div class="text-muted-foreground flex items-center justify-between text-xs">
                        <span>Marcus Johnson</span>
                        <span>April 15, 2023</span>
                      </div>
                    </div>
                  </a>
                </article>

                <!-- Article Card 3 -->
                <article class="article-card overflow-hidden rounded-lg">
                  <a href="#" class="block">
                    <div class="overflow-hidden">
                      <img src="https://images.unsplash.com/photo-1517142089942-ba376ce32a2e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80" alt="Digital Craftsmanship" class="h-64 w-full object-cover" />
                    </div>
                    <div class="p-6">
                      <div class="mb-3">
                        <span class="text-primary text-xs font-medium tracking-wider uppercase"> Design </span>
                      </div>
                      <h3 class="mb-3 font-serif text-xl font-medium">The New Era of Digital Craftsmanship</h3>
                      <p class="text-muted-foreground mb-4 text-sm">Artisans embracing technology to create unique pieces that blur the line between traditional and digital.</p>
                      <div class="text-muted-foreground flex items-center justify-between text-xs">
                        <span>Nicole Patel</span>
                        <span>June 7, 2023</span>
                      </div>
                    </div>
                  </a>
                </article>
              </div>

              <div class="mt-12 text-center md:hidden">
                <a href="#" class="group inline-flex items-center text-sm font-medium tracking-wider uppercase">
                  View All Articles
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-2 transition-transform group-hover:translate-x-1">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                  </svg>
                </a>
              </div>
            </div>
          </section>
    </div>
    <!-- End Card Blog -->
@endsection
