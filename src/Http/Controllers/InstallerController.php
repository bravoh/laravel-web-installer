<?php

namespace Bravoh\LaravelWebInstaller\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class InstallerController extends Controller
{
    public function index(Request $request){
        $this->writeEnvironmentFile('APP_URL', URL::to('/'));
        return view('laravel-web-installer::index');
    }


    public function step1() {
        $folders = config('laravel-web-installer.permissions');

        foreach ($folders as $key=>$val){
            $permission[$key.' writeable']     = is_writable(base_path('.env'));
        }

        $server_rq = $this->checkRq();

        return view('laravel-web-installer::step1', compact('permission','server_rq'));
    }

    /**
     * Check for the server requirements.
     *
     * @param array $requirements
     * @return array
     */
    public function checkRq()
    {
        $requirements = config('laravel-web-installer.requirements');
        $results = [];
        foreach ($requirements as $type => $requirement) {
            switch ($type) {
                // check php requirements
                case 'php':
                    foreach ($requirements[$type] as $requirement) {
                        $results['requirements'][$type][$requirement] = true;
                        if (! extension_loaded($requirement)) {
                            $results['requirements'][$type][$requirement] = false;
                            $results['errors'] = true;
                        }
                    }
                    break;
                // check apache requirements
                case 'apache':
                    foreach ($requirements[$type] as $requirement) {
                        // if function doesn't exist we can't check apache modules
                        if (function_exists('apache_get_modules')) {
                            $results['requirements'][$type][$requirement] = true;
                            if (! in_array($requirement, apache_get_modules())) {
                                $results['requirements'][$type][$requirement] = false;
                                $results['errors'] = true;
                            }
                        }
                    }
                    break;
            }
        }

        return $results;
    }

    public function step2() {
        return view('laravel-web-installer::step2');
    }

    public function step3($error = "") {

        if($error == ""){
            return view('laravel-web-installer::step3');
        }else {
            return view('laravel-web-installer::step3', compact('error'));
        }
    }

    public function step4() {
        return view('laravel-web-installer::step4');
    }

    public function step5() {
        return view('laravel-web-installer::step5');
    }


    public function writeEnvironmentFile($type, $val) {
        $this->createDotEnv();

        $path = base_path('.env');

        if (file_exists($path)) {
            $val = '"'.trim($val).'"';
            file_put_contents($path, str_replace(
                $type.'="'.env($type).'"', $type.'='.$val, file_get_contents($path)
            ));
        }

    }

    public function createDotEnv(){
        if (!file_exists(base_path('.env'))){
            copy(base_path('.env.example'),base_path('.env'));
            chmod(base_path('.env'),775);
        }
    }
}
