<?php

namespace Credissimo\Shop\Application\Category;

use Credissimo\Shop\Domain\Model\Category;
use Credissimo\Shop\Domain\Repository\CategoryRepository;

class CategoryQueryService
{
    /** @var CategoryRepository */
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @return array
     */
    public function getCategoriesAsOptionList()
    {
        $categories = $this->categoryRepository->findAll();

        return array_map(function (Category $category) {
            return [$category->getId() => $category->getName()];
        }, $categories);
    }

    /**
     * @param $id
     *
     * @return Category
     */
    public function getCategory($id)
    {
        return $this->categoryRepository->finsOneById($id);
    }

    /**
     * @return Category[]
     */
    public function getCategories()
    {
        return $this->categoryRepository->findAll();
    }
}
