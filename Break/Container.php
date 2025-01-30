<?php

namespace Break;

use ReflectionClass;

class Container
{
    protected array $bindings = [];

    /**
     * @throws \ReflectionException
     */
    public function resolve(string|callable $abstract)
    {
        if (is_callable($abstract)) {
            return call_user_func($abstract);
        }
        return $this->createInstance($abstract);
    }

    /**
     * @throws \ReflectionException
     */
    private function createInstance(string $className)
    {
        if (isset($this->bindings[$className])) {
            $concrete = $this->bindings[$className];
            return new $concrete;
        }

        $dependencies = $this->getReflectionDependencies($this->getReflectedClass($className));
        if ($dependencies) {
            $resolvedDependencies = [];
            foreach ($dependencies as $dependency) {
                if ($dependency->isOptional()) {
                    continue;
                }
                if ($dependency->getType()) {
                    $dependencyName = $dependency->getName();
                    var_dump($dependencyName);
                } else {
                    return new $className($this->getConfingData($className));
                }
            }
            return new $className(...$resolvedDependencies);
        }

        $this->bind($className, $className);
        return new $className;
    }

    private function getReflectionDependencies(ReflectionClass $reflectedClass): ?array
    {
        if (!$reflectedClass->hasMethod('__construct')) {
            return null;
        }
        return $reflectedClass->getConstructor()->getParameters() ?? null;
    }

    /**
     * @throws \ReflectionException
     */
    private function getReflectedClass(string $abstract): ReflectionClass
    {
        return new ReflectionClass($abstract);
    }

    public function bind(string $abstract, string|callable $concrete)
    {
        $this->bindings[$abstract] = $concrete;
    }
    protected function getConfingData(string $className)
    {
        $className = strstr($className, "\\");
        $className = trim($className, '\\');

        return http_build_query(require("Config/" . strtolower($className) . ".php"), "", ";");
    }
}
