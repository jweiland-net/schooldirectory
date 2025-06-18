<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/schooldirectory.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Schooldirectory\Pagination;

use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Core\Pagination\PaginationInterface;
use TYPO3\CMS\Core\Pagination\PaginatorInterface;
use TYPO3\CMS\Core\Utility\ArrayUtility;

/**
 * This is a simple paginator which also respects GET and POST arguments from Request
 */
class RequestPagination implements PaginationInterface
{
    protected string $pluginNamespace = 'tx_schooldirectory_list';

    protected PaginatorInterface $paginator;

    /**
     * @var array<string, mixed>
     */
    protected array $arguments = [];

    public function __construct(PaginatorInterface $paginator)
    {
        $this->paginator = $paginator;
        $pluginArguments = $this->getPluginArguments($this->pluginNamespace);

        foreach ($pluginArguments as $argumentName => $argument) {
            if (is_string($argumentName) && strlen($argumentName) >= 2 && $argumentName[0] === '_' && $argumentName[1] === '_') {
                continue;
            }

            if (is_string($argumentName) && in_array($argumentName, ['@extension', '@subpackage', '@controller', '@action', '@format'], true)) {
                continue;
            }

            if (in_array($argumentName, ['extension', 'plugin', 'controller', 'action'], true)) {
                continue;
            }

            $this->arguments[$argumentName] = $argument;
        }
    }

    /**
     * Returns the number of the previous page or null if there is no previous page
     */
    public function getPreviousPageNumber(): ?int
    {
        $previousPage = $this->paginator->getCurrentPageNumber() - 1;

        if ($previousPage > $this->paginator->getNumberOfPages()) {
            return null;
        }

        return $previousPage >= $this->getFirstPageNumber() ? $previousPage : null;
    }

    /**
     * Returns the arguments for the previous page or null if there is no previous page
     *
     * @return array<string, mixed>|null The arguments for the previous page or null if there is no previous page
     */
    public function getPreviousPageArguments(): ?array
    {
        $previousPageNumber = $this->getPreviousPageNumber();
        if ($previousPageNumber === null) {
            return null;
        }

        $arguments = $this->arguments;
        $arguments['currentPage'] = $previousPageNumber;

        return $arguments;
    }

    /**
     * Returns the number of the next page or null if there is no next page
     */
    public function getNextPageNumber(): ?int
    {
        $nextPage = $this->paginator->getCurrentPageNumber() + 1;

        return $nextPage <= $this->paginator->getNumberOfPages() ? $nextPage : null;
    }

    /**
     * Returns the arguments for the next page or null if there is no next page
     *
     * @return array<string, mixed>|null The arguments for the next page or null if there is no next page
     */
    public function getNextPageArguments(): ?array
    {
        $nextPageNumber = $this->getNextPageNumber();
        if ($nextPageNumber === null) {
            return null;
        }

        $arguments = $this->arguments;
        $arguments['currentPage'] = $nextPageNumber;

        return $arguments;
    }

    /**
     * Returns the number of the first page
     */
    public function getFirstPageNumber(): int
    {
        return 1;
    }

    /**
     * Returns the arguments for the first page
     *
     * @return array<string, mixed> The arguments for the first page
     */
    public function getFirstPageArguments(): array
    {
        $arguments = $this->arguments;
        $arguments['currentPage'] = $this->getFirstPageNumber();

        return $arguments;
    }

    /**
     * Returns the number of the last page
     */
    public function getLastPageNumber(): int
    {
        return $this->paginator->getNumberOfPages();
    }

    /**
     * Returns the arguments for the last page
     *
     * @return array<string, mixed> The arguments for the last page
     */
    public function getLastPageArguments(): array
    {
        $arguments = $this->arguments;
        $arguments['currentPage'] = $this->getLastPageNumber();

        return $arguments;
    }

    /**
     * Returns the number of the first record on the current page
     */
    public function getStartRecordNumber(): int
    {
        if ($this->paginator->getCurrentPageNumber() > $this->paginator->getNumberOfPages()) {
            return 0;
        }

        return $this->paginator->getKeyOfFirstPaginatedItem() + 1;
    }

    /**
     * Returns the number of the last record on the current page
     */
    public function getEndRecordNumber(): int
    {
        if ($this->paginator->getCurrentPageNumber() > $this->paginator->getNumberOfPages()) {
            return 0;
        }

        return $this->paginator->getKeyOfLastPaginatedItem() + 1;
    }

    /**
     * Returns the plugin arguments from the request
     *
     * @return array<string, mixed> The plugin arguments
     */
    public function getPluginArguments(string $pluginNamespace): array
    {
        $request = $this->getRequestFromGlobalScope();
        $getMergedWithPost = $request->getQueryParams()[$pluginNamespace] ?? [];
        $postArgument = $request->getParsedBody()[$pluginNamespace] ?? [];
        ArrayUtility::mergeRecursiveWithOverrule($getMergedWithPost, $postArgument);

        return $getMergedWithPost;
    }

    /**
     * Returns the current request from the global scope
     */
    public function getRequestFromGlobalScope(): ServerRequestInterface
    {
        return $GLOBALS['TYPO3_REQUEST'];
    }

    public function getAllPageNumbers(): array
    {
        $firstPage = $this->getFirstPageNumber();
        $lastPage = $this->getLastPageNumber();

        if ($lastPage < $firstPage) {
            return [];
        }

        return range($firstPage, $lastPage);
    }
}
