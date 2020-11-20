<?php
namespace Deployer;

require 'recipe/symfony.php';

// Project name
set('application', 'symfony_flow_tags_service');

// Project repository
set('repository', 'git@github.com:thedtv-1961/symfony_flow_tags_service.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true); 

// Shared files/dirs between deploys 
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server 
add('writable_dirs', []);
set('allow_anonymous_stats', false);

set('branch', 'main');

// Hosts

host('172.0.0.2')
	->user('deploy')
    ->set('deploy_path', '/var/www/html/{{application}}');    
    
// Tasks

task('deploy', function () {
    
});



// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

// before('deploy:symlink', 'database:migrate');

