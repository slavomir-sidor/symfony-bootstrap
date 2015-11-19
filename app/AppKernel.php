<?php
/**
 * 
 */
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

/**
 *
 * @author egit
 *        
 */
class AppKernel extends Kernel {
	
	/**
	 * (non-PHPdoc)
	 *
	 * @see \Symfony\Component\HttpKernel\KernelInterface::registerBundles()
	 */
	public function registerBundles() {
		$bundles = array (
				new Symfony\Bundle\FrameworkBundle\FrameworkBundle (),
				new Symfony\Bundle\SecurityBundle\SecurityBundle (),
				new Symfony\Bundle\TwigBundle\TwigBundle (),
				new Symfony\Bundle\MonologBundle\MonologBundle (),
				new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle (),
				new Symfony\Bundle\AsseticBundle\AsseticBundle (),
				new Doctrine\Bundle\DoctrineBundle\DoctrineBundle (),
				new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle (),
				new EGit\Bundle\AAABundle\EGitAAABundle (),
				new AppBundle\AppBundle () 
		);
		
		if (in_array ( $this->getEnvironment (), array (
				'dev',
				'test' 
		) )) {
			$bundles [] = new Symfony\Bundle\DebugBundle\DebugBundle ();
			$bundles [] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle ();
			$bundles [] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle ();
			$bundles [] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle ();
		}
		
		return $bundles;
	}
	
	/**
	 *
	 * @param LoaderInterface $loader        	
	 */
	public function registerContainerConfiguration(LoaderInterface $loader) {
		$environment = $this->getEnvironment ();
		$config = __DIR__ . sprintf ( '/config/%s/config.xml', $environment );
		if (! file_exists ( $config )) {
			
			$config = __DIR__ . sprintf ( '/config/config.xml' );
		}
		$loader->load ( $config );
	}
}
