<?php

namespace Credissimo\Shop\Application\Category;

use Credissimo\Shop\Domain\Repository\CategoryRepository;

class CategoryQueryService
{
    /** @var CategoryRepository */
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
}
