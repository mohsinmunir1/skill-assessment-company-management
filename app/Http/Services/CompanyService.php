<?php

namespace App\Http\Services;


use App\Http\Repositories\CompanyRepository;
use App\Models\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class CompanyService
{

    /**
     * @param CompanyRepository $companyRepository
     */
    public function __construct(
        private CompanyRepository $companyRepository
    ) {}

    /**
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model
    {
        if (!empty($data['image'])) {
            $picture = $data['image'];
            $picturename = $picture->getClientOriginalName();
            $picturename = explode('.', $picturename);
            $picturenameexe = end($picturename);
            $picturename = uniqid() . '.' . $picturenameexe;
            $data['logo'] = $picturename;
            $picture->storeAs('public', $picturename);
        }
        return $this->companyRepository->create($data);
    }

    /**
     * @return LengthAwarePaginator
     */
    public function get(): LengthAwarePaginator
    {
        return $this->companyRepository->paginate();
    }

    /**
     * @param Company $company
     * @param array $data
     *
     * @return bool
     */
    public function update(Company $company, array $data): bool
    {
        if (!empty($data['image'])) {
            $picture = $data['image'];
            $picturename = $picture->getClientOriginalName();
            $picturename = explode('.', $picturename);
            $picturenameexe = end($picturename);
            $picturename = uniqid() . '.' . $picturenameexe;
            $data['logo'] = $picturename;
            $picture->storeAs('public', $picturename);
        }
        return $this->companyRepository->update($company, $data);
    }

    /**
     * @param Company $company
     * @return bool
     */
    public function delete(Company $company): bool
    {
        return $this->companyRepository->delete($company);
    }

}
