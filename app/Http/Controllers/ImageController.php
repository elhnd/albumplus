<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ {
    ImageRepository, CategoryRepository
};

class ImageController extends Controller
{
    /**
     * Image repository.
     *
     * @var \App\Repositories\ImageRepository
     */
    protected $imageRepository;

    /**
     * Category repository.
     *
     * @var \App\Repositories\CategoryRepository
     */
    protected $categoryRepository;

    /**
     * Create a new ImageController instance.
     *
     * @param  \App\Repositories\ImageRepository $imageRepository
     * @param  \App\Repositories\CategoryRepository $categoryRepository
     */
    public function __construct(
        ImageRepository $imageRepository,
        CategoryRepository $categoryRepository)
    {
        $this->imageRepository = $imageRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('images.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate ([
            'image' => 'required|image|max:2000',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string|max:255',
        ]);

        $this->imageRepository->store ($request);

        return back ()->with ('ok', __ ("L'image a bien été enregistrée"));
    }

    /**
     * Display a listing of the images for the specified category.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function category($slug)
    {
        $category = $this->categoryRepository->getBySlug ($slug);
        $images = $this->imageRepository->getImagesForCategory ($slug);

        return view ('home', compact ('category', 'images'));
    }
}
