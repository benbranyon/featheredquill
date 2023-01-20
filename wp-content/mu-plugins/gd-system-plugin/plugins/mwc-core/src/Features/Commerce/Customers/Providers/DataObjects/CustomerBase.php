<?php

namespace GoDaddy\WordPress\MWC\Core\Features\Commerce\Customers\Providers\DataObjects;

class CustomerBase extends AbstractDataObject
{
    public ?string $id;
    public string $firstName;
    public string $lastName;

    /** @var Email[] */
    public array $emails;

    /** @var Address[] */
    public array $addresses = [];

    /**
     * Creates a new data object.
     *
     * @param array{
     *     id: ?string,
     *     firstName: string,
     *     lastName: string,
     *     emails: Email[],
     *     addresses?: Address[]
     * } $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);
    }
}
