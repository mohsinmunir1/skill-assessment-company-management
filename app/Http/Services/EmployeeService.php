<?php

namespace App\Http\Services;


use App\Http\Repositories\EmployeeRepository;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class EmployeeService
{

    /**
     * @param EmployeeRepository $employeeRepository
     */
    public function __construct(
        private EmployeeRepository $employeeRepository
    ) {}

    /**
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model
    {
        return $this->employeeRepository->create($data);
    }

    /**
     * @return LengthAwarePaginator
     */
    public function get(): LengthAwarePaginator
    {
        return $this->employeeRepository->paginate();
    }

    /**
     * @param Employee $employee
     * @param array $data
     * @return bool
     */
    public function update(Employee $employee, array $data): bool
    {
        return $this->employeeRepository->update($employee, $data);
    }

    /**
     * @param Employee $employee
     * @return bool
     */
    public function delete(Employee $employee): bool
    {
        return $this->employeeRepository->delete($employee);
    }

}
