<?php
namespace Smile\PHPUnitTest\Tests\Demo;
use Smile\PHPUnitTest\Tests\SmilePHPUnitCase;



/**
 * 桩件、替身测试
 * 有时候对被测系统(SUT)进行测试是很困难的，因为它依赖于其他无法在测试环境中使用的组件。
 * 这有可能是因为这些组件不可用，它们不会返回测试所需要的结果，或者执行它们会有不良副作用。
 * 在其他情况下，我们的测试策略要求对被测系统的内部行为有更多控制或更多可见性。
 * 如果在编写测试时无法使用（或选择不使用）实际的依赖组件(DOC)，
 * 可以用测试替身来代替。测试替身不需要和真正的依赖组件有完全一样的的行为方式；
 * 他只需要提供和真正的组件同样的 API 即可，这样被测系统就会以为它是真正的组件！
 * @backupGlobals disabled
 */
class Demo3Stubs2CartTest extends \PHPUnit_Framework_TestCase{

}