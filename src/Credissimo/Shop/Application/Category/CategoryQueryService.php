<?php

namespace Credissimo\Shop\Application\Category;

use Credissimo\Shop\Domain\Model\Category;
use Credissimo\Shop\Domain\Repository\CategoryRepository;

class CategoryQueryService
{
    /** @var CategoryRepository */
    private $categoryRepository;

    /**
     * @param CategoryRepository $categoryRepository
     */
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
     * @return CategoryRepresentation
     */
    public function getCategory($id)
    {
        return new CategoryRepresentation($this->categoryRepository->finsOneById($id));
    }

    /**
     * @return CategoryRepresentation[]
     */
    public function getCategories()
    {
        return $this->convertToRepresentation($this->categoryRepository->findAll());
    }

    /**
     * @param $categories
     *
     * @return CategoryRepresentation[]
     */
    protected function convertToRepresentation($categories)
    {
        return array_map(function (Category $categories) {
            return new CategoryRepresentation($categories);
        },
            $categories
        );
    }
}
