<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/umkm', function () {
    return view('umkm');
});

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


$umkms = [
    1 => [
        'id' => 1,
        'name' => 'Kopi Lestari',
        'category' => 'F&B',
        'image' => 'https://images.unsplash.com/photo-1497935586351-b67a49e012bf?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&h=800&q=80',
        'description' => 'Traditional coffee shop looking to expand distribution network. We have been serving the local community for over 5 years and are now ready to take our unique blend to a wider market.',
        'owner' => 'Pak Joko Widodo',
        'location' => 'Jakarta Selatan, DKI Jakarta',
        'email' => 'kopi.lestari@example.com',
        'phone' => '+62 812-3456-7890',
        'established' => '2018',
        'employees' => '5-10',
        'needs' => 'Supply chain optimization and distribution strategy',
        'reward' => '15%',
        'milestones' => [
            'Help grow revenue by 10% within 2 months',
            'Establish distribution partnerships with at least 3 new retailers',
            'Implement inventory management system',
            'Provide monthly strategic guidance for 6 months'
        ]
    ],
    2 => [
        'id' => 2,
        'name' => 'Batik Nusantara',
        'category' => 'Fashion',
        'image' => 'https://images.unsplash.com/photo-1528698718685-15e56f75a616?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&h=800&q=80',
        'description' => 'Handmade batik producer seeking digital transformation. Our artisans create exquisite patterns that tell the story of our heritage, and we want to share this with the world through online channels.',
        'owner' => 'Ibu Siti Aminah',
        'location' => 'Yogyakarta, DIY',
        'email' => 'batik.nusantara@example.com',
        'phone' => '+62 813-9876-5432',
        'established' => '2015',
        'employees' => '10-20',
        'needs' => 'E-commerce platform and digital marketing',
        'reward' => '20%',
        'milestones' => [
            'Launch e-commerce website within 3 months',
            'Achieve 100 online sales in the first month',
            'Develop social media marketing strategy',
            'Train staff on digital order processing'
        ]
    ],
    3 => [
        'id' => 3,
        'name' => 'Furniture Jati',
        'category' => 'Manufacturing',
        'image' => 'https://images.unsplash.com/photo-1556228453-efd6c1ff04f6?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&h=800&q=80',
        'description' => 'Wooden furniture manufacturer needs export guidance. We craft high-quality teak furniture and are looking to navigate the complexities of international trade to reach European markets.',
        'owner' => 'Pak Budi Santoso',
        'location' => 'Jepara, Jawa Tengah',
        'email' => 'furniture.jati@example.com',
        'phone' => '+62 811-2233-4455',
        'established' => '2010',
        'employees' => '20-50',
        'needs' => 'Export documentation and international marketing',
        'reward' => '12%',
        'milestones' => [
            'Secure first export order within 6 months',
            'Obtain necessary export certifications',
            'Participate in one international trade fair',
            'Develop export pricing strategy'
        ]
    ],
    4 => [
        'id' => 4,
        'name' => 'Keripik Pedas',
        'category' => 'F&B',
        'image' => 'https://images.unsplash.com/photo-1621447504864-d8686e12698c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&h=800&q=80',
        'description' => 'Spicy chips producer seeking packaging redesign. Our chips are delicious, but our packaging needs to stand out on the shelves to attract more customers.',
        'owner' => 'Ibu Rina Wati',
        'location' => 'Bandung, Jawa Barat',
        'email' => 'keripik.pedas@example.com',
        'phone' => '+62 815-6789-0123',
        'established' => '2020',
        'employees' => '1-5',
        'needs' => 'Branding and packaging design',
        'reward' => '18%',
        'milestones' => [
            'Finalize new brand identity and logo',
            'Launch new packaging design',
            'Increase retail presence by 20%',
            'Conduct consumer taste testing'
        ]
    ],
    5 => [
        'id' => 5,
        'name' => 'Sabun Organik',
        'category' => 'Beauty',
        'image' => 'https://images.unsplash.com/photo-1600857062241-98e5b4f90b69?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&h=800&q=80',
        'description' => 'Organic soap maker looking for retail partnerships. We use only natural ingredients and sustainable practices, and we want to partner with eco-friendly retailers.',
        'owner' => 'Ibu Dewi Sartika',
        'location' => 'Bali',
        'email' => 'sabun.organik@example.com',
        'phone' => '+62 819-8765-4321',
        'established' => '2019',
        'employees' => '5-10',
        'needs' => 'Retail strategy and partnership development',
        'reward' => '25%',
        'milestones' => [
            'Secure partnerships with 5 boutique hotels',
            'Get listed in 3 major organic stores',
            'Develop B2B sales presentation',
            'Optimize production cost by 10%'
        ]
    ],
    6 => [
        'id' => 6,
        'name' => 'Tas Kulit',
        'category' => 'Fashion',
        'image' => 'https://images.unsplash.com/photo-1548036328-c9fa89d128fa?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&h=800&q=80',
        'description' => 'Leather bag craftsman needs quality control system. We pride ourselves on craftsmanship, but we need to scale our production without compromising on quality.',
        'owner' => 'Pak Andi Wijaya',
        'location' => 'Garut, Jawa Barat',
        'email' => 'tas.kulit@example.com',
        'phone' => '+62 817-6543-2109',
        'established' => '2012',
        'employees' => '10-15',
        'needs' => 'Quality management and production efficiency',
        'reward' => '16%',
        'milestones' => [
            'Implement standardized QC checklist',
            'Reduce defect rate to under 1%',
            'Train 2 new master craftsmen',
            'Streamline raw material sourcing'
        ]
    ]
];

Route::get('/umkm/{id}', function ($id) use ($umkms) {
    if (!isset($umkms[$id])) {
        abort(404);
    }
    return view('umkm-detail', ['umkm' => $umkms[$id]]);
});

Route::get('/faq', function () {
    return view('faq');
});