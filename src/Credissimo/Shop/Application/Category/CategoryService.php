<?php

namespace Credissimo\Shop\Application\Category;

use Credissimo\Shop\Domain\Model\Category;
use Credissimo\Shop\Domain\Repository\CategoryRepository;

class CategoryService
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
     * @param CreateCategoryCommand $command
     */
    public function create(CreateCategoryCommand $command)
    {
        $category = new Category($command->name);
        $this->categoryRepository->save($category);
    }
}
